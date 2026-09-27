<?php

namespace Tests\Unit;

use App\Support\ServiceWorkflow;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\TestCase;

class ServiceWorkflowTest extends TestCase
{
    public function test_return_admin_transitions_keep_refund_and_return_branches_separate(): void
    {
        $this->assertSame(['approved', 'request_rejected'], ServiceWorkflow::adminTransitions('return', 'pending'));
        $this->assertSame(['refund_approved', 'refund_rejected'], ServiceWorkflow::adminTransitions('return', 'received'));
        $this->assertNotContains('refunded', ServiceWorkflow::adminTransitions('return', 'received'));
        $this->assertSame(['return_prepared'], ServiceWorkflow::adminTransitions('return', 'refund_rejected'));
    }

    public function test_warranty_transitions_do_not_skip_receipt_or_processing(): void
    {
        $this->assertSame(['received'], ServiceWorkflow::adminTransitions('warranty', 'customer_shipped'));
        $this->assertSame(['processing', 'rejected'], ServiceWorkflow::adminTransitions('warranty', 'received'));
        $this->assertNotContains('completed', ServiceWorkflow::adminTransitions('warranty', 'received'));
        $this->assertSame(['return_prepared'], ServiceWorkflow::adminTransitions('warranty', 'rejected'));
    }

    public function test_customers_only_get_their_shipment_and_receipt_actions(): void
    {
        $this->assertSame('return_shipped', ServiceWorkflow::customerTransition('return', 'approved'));
        $this->assertSame('customer_received', ServiceWorkflow::customerTransition('return', 'return_shipping'));
        $this->assertSame('customer_shipped', ServiceWorkflow::customerTransition('warranty', 'approved'));
        $this->assertSame('customer_received', ServiceWorkflow::customerTransition('warranty', 'shipping'));
        $this->assertNull(ServiceWorkflow::customerTransition('return', 'received'));
        $this->assertNull(ServiceWorkflow::customerTransition('warranty', 'received'));
    }

    public function test_completed_return_timeline_uses_refund_rejection_history_branch(): void
    {
        $history = [
            (object) ['new_status' => 'pending', 'created_at' => Carbon::parse('2026-09-28 10:00:00')],
            (object) ['new_status' => 'refund_rejected', 'created_at' => Carbon::parse('2026-09-29 10:00:00')],
        ];

        $timeline = ServiceWorkflow::timeline('return', 'completed', $history, Carbon::parse('2026-09-28 10:00:00'));
        $statuses = array_column($timeline, 'status');

        $this->assertContains('refund_rejected', $statuses);
        $this->assertContains('return_shipping', $statuses);
        $this->assertContains('customer_received', $statuses);
        $this->assertNotContains('refund_approved', $statuses);
        $this->assertSame('completed', end($statuses));
    }

    public function test_legacy_statuses_map_to_the_new_workflow_without_losing_existing_records(): void
    {
        $this->assertSame('request_rejected', ServiceWorkflow::legacyStatus('return', 'rejected'));
        $this->assertSame('processing', ServiceWorkflow::legacyStatus('warranty', 'repairing'));
        $this->assertSame('repaired', ServiceWorkflow::legacyStatus('warranty', 'ready'));
        $this->assertSame('Hoàn tiền thành công', ServiceWorkflow::label('return', 'refunded'));
    }
}
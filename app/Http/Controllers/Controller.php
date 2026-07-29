<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function cartSessionKey(): string
    {
        $customer = session('customer');
        $customerId = $customer['id'] ?? null;

        return $customerId ? 'cart.' . $customerId : 'cart.guest';
    }

    protected function getCartItems(): array
    {
        return session()->get($this->cartSessionKey(), []);
    }

    protected function saveCartItems(array $cart): void
    {
        session()->put($this->cartSessionKey(), $cart);
    }

    protected function clearCartItems(): void
    {
        session()->forget($this->cartSessionKey());
    }

    protected function migrateGuestCartToCustomer(): void
    {
        $customer = session('customer');

        if (!$customer || empty($customer['id'])) {
            return;
        }

        $customerCartKey = 'cart.' . $customer['id'];
        $guestCart = session()->get('cart.guest', []);
        $customerCart = session()->get($customerCartKey, []);

        if (!empty($guestCart)) {
            $mergedCart = $customerCart;

            foreach ($guestCart as $variantId => $item) {
                if (isset($mergedCart[$variantId])) {
                    $mergedCart[$variantId]['quantity'] += $item['quantity'] ?? 0;
                } else {
                    $mergedCart[$variantId] = $item;
                }
            }

            session()->put($customerCartKey, $mergedCart);
        }

        session()->forget('cart.guest');
    }
}

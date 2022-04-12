<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
        
    }

    //обновляе если изменение количества происходит путем ввода в поле input
    public function changeQty($rowId, $newQty)
    {
        Cart::update($rowId, $newQty);
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        session()->flash('success_message', "Товар был удален из корзины");
    }

    public function destroyAll()
    {
        Cart::destroy();
        session()->flash('success_message', "Корзина очищена");
    }
    

    public function render()
    {
        return view('livewire.cart-component')->layout("layouts.base");
    }
}

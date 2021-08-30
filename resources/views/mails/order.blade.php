@component('mail::message')
# Клиент {{ $usersData->name }}
<ul>
    <b>Детали заказа:</b>
    <li>Город: {{ $usersData->city }}</li>
    <li>Телефон: {{ $usersData->phone }}</li>
    <li>Улица: {{ $usersData->street }}</li>
    <li>Номер дома: {{ $usersData->apartment }}</li>
    <li>Дополнительное сообщение: {{ $usersData->notes }}</li>
    <li>Оплата:
        @if($usersData->paymentMethod[0] == '1')
        Картой
            @else
        Наличными
        @endif
    </li>
</ul>


@component('mail::panel')
    <table>
@foreach($cart as $cartProduct)
    <tr class="cart_item">
        <td><img src="{{ asset('storage/'.$cartProduct->options->avatar)}}" alt="{{$cartProduct->options->slug}}"></td>
        <td class="cart-product-name">{{ $cartProduct->options->slug }} <span class="badge bg-primary">{{ $cartProduct->options->taste }}</span></td>
        <td class="cart-product-total"><span class="amount">{{ $cartProduct->price * $cartProduct->qty }} тенге</span></td>
    </tr>
@endforeach
    </table>
    <b>Всего <span>{{ $cartTotal }} тенге</span></b>
@endcomponent

Спасибо за покупку,<br>
{{ config('app.name') }}
@endcomponent

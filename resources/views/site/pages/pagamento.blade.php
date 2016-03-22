@extends('site.layout')

@section('content')

    <div class="container no-padding">
        <section id="pricePlans">
            <ul id="plans">
                <li class="plan">
                    <ul class="planContainer">
                        <li class="title"><h2>Plano 1</h2></li>
                        <li class="price"><p>R$00,00</p></li>
                        <li>
                            <ul class="options">
                                <li>1x <span>Instalação</span></li>
                                <li>Odoo <span>Documentacao</span></li>
                                <li>Unlimited <span>option 3</span></li>
                                <li>Unlimited <span>option 4</span></li>
                                <li>1x <span>option 5</span></li>
                            </ul>
                        </li>
                        <li class="button"><a href="#">Adquirir já</a></li>
                    </ul>
                </li>
                <li class="plan">
                    <ul class="planContainer">
                        <li class="title"><h2 class="bestPlanTitle">Plano 2</h2></li>
                        <li class="price"><p class="bestPlanPrice">R$300</p></li>
                        <li>
                            <ul class="options">
                                <li>2x <span>option 1</span></li>
                                <li>Free <span>option 2</span></li>
                                <li>Unlimited <span>option 3</span></li>
                                <li>Unlimited <span>option 4</span></li>
                                <li>1x <span>option 5</span></li>
                            </ul>
                        </li>
                        <li class="button"><a class="bestPlanButton" href="#">Adquirir já</a></li>
                    </ul>
                </li>

                <li class="plan">
                    <ul class="planContainer">
                        <li class="title"><h2>Plano 4</h2></li>
                        <li class="price"><p>R$00,00</p></li>
                        <li>
                            <ul class="options">
                                <li>2x <span>option 1</span></li>
                                <li>Free <span>option 2</span></li>
                                <li>Unlimited <span>option 3</span></li>
                                <li>Unlimited <span>option 4</span></li>
                                <li>1x <span>option 5</span></li>
                            </ul>
                        </li>
                        <li class="button"><a href="#">Adquirir já</a></li>
                    </ul>
                </li>
                <li class="plan">
                    <ul class="planContainer">
                        <li class="title"><h2>Plano 5</h2></li>
                        <li class="price"><p>R$00,00</p></li>
                        <li>
                            <ul class="options">
                                <li>2x <span>option 1</span></li>
                                <li>Free <span>option 2</span></li>
                                <li>Unlimited <span>option 3</span></li>
                                <li>Unlimited <span>option 4</span></li>
                                <li>1x <span>option 5</span></li>
                            </ul>
                        </li>
                        <li class="button"><a href="#">Adquirir já</a></li>
                    </ul>
                </li>
            </ul> <!-- End ul#plans -->
        </section>
    </div>

@endsection
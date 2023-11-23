<x-header />

<div class="mt-16">
    @foreach ($collection as $key=>$offer)
        <div class="grid grid-cols-12 md:grid-cols-12 mb-4 offers-size">
            <div
                class="scale-100 p-6 bg-dark dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div class="container-fluid">
                    
                    <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white modalidade-nome">{{$offer['nomeModalidade']}}</h1>
                    @if ($key==0)
                        <span class="badge rounded-pill mt-4 bg-warning text-dark justify-content-end">Melhor Oferta</span>
                    @endif
                    <ul class="list-group mt-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="modalidade-nome">Mínimo de Parcelas</div>
                            <span class="badge bg-primary rounded-pill">{{ $offer['QntParcelaMin'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="modalidade-nome">Máximo de Parcelas</div>
                            <span class="badge bg-success rounded-pill">{{ $offer['QntParcelaMax'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="modalidade-nome">Valor Mínimo</div>
                            <span class="badge bg-primary rounded-pill">R$ {{ $offer['valorMin'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="modalidade-nome">Valor Máximo</div>
                            <span class="badge bg-primary rounded-pill">R$ {{ $offer['valorMax'] }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="modalidade-nome">Juros por Mês</div>
                            <span class="badge bg-danger rounded-pill">R$ {{ $offer['jurosMes'] }}</span>
                        </li>
                    </ul>

                </div>

            </div>

        </div>
    @endforeach
</div>
<x-footer />

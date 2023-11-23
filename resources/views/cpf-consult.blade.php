<x-header />

<div class="mt-16">
    @foreach ($instituicoes as $instituicao)

    <div class="grid grid-cols-12 md:grid-cols-12 mb-4">
        <div class="scale-100 p-6 bg-dark dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
            <div class="container-fluid">

                <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{$instituicao['nome']}}</h1>
                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                    <h4 class="text-secondary">Modalidades Disponíveis:</h4>
                </p>
                <ul class="list-group mt-4">
                    @foreach ($instituicao['modalidades'] as $modalidade)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="modalidade-nome"> {{$modalidade['nome']}} </div>
                        <span class="badge bg-primary rounded-pill">cod: {{$modalidade['cod']}}</span>
                      </li>
                    @endforeach
                  </ul>

                  <a href="{{route('cpf.show',['cpf' => $cpf,'id_instituicao' => $instituicao['id']] )}}" 
                    class="btn btn-outline-primary mt-4 ">Obter ofertas para essa instituição</a>
            </div>

        </div>

        </div>
    </div>
    @endforeach
</div>

<x-footer />

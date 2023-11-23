<x-header />

<div class="mt-16">
    <div class="grid grid-cols-12 md:grid-cols-12">
        <div
            class="scale-100 p-6 bg-dark dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
            <div class="container-fluid">
                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        class="w-7 h-7 stroke-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>

                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white add-margin">Consulte as ofertas de crédito para seu CPF</h2>

                <form action="{{ route('cpf.index') }}" data-form-consult-cpf="">
                    @csrf
                    <div class="mb-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="cpf" name="cpf"
                                placeholder="name@example.com" data-input-cpf maxlength="14" required>
                            <label for="cpf">CPF</label>
                            <div class="label-error" data-label-invalid-cpf=""></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-6">Consultar</button>
                </form>
            </div>

        </div>
    </div>

    <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
        <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
            Api desenvolvida por Pedro de Souza - Laravel v{{ Illuminate\Foundation\Application::VERSION }}
            (PHP v{{ PHP_VERSION }}) - <a href="https://github.com/Luckycaat">https://github.com/Luckycaat</a>
        </div>
    </div>

</div>

<x-footer />

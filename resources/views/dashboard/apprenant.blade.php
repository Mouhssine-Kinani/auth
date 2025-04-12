<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Apprenant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-xl font-bold">Formation Platform</span>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="text-gray-700 mr-4">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-gray-900">
                            Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="border-4 border-dashed border-gray-200 rounded-lg p-4">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold">Mes Formations</h1>
                </div>

                <!-- Liste des formations inscrites -->
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($formations as $formation)
                        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                            <div class="p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $formation->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($formation->description, 100) }}</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span class="text-sm text-gray-500">
                                            {{ $formation->formateur->name }}
                                        </span>
                                    </div>
                                    <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                        Accéder au cours
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($formations->isEmpty())
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Aucune formation</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Vous n'êtes inscrit à aucune formation pour le moment.
                        </p>
                        <div class="mt-6">
                            <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Parcourir les formations disponibles
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>

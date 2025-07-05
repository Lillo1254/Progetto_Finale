<x-layout titlePage="Profilo Articoli"> 
 
  <h1>{{ $user->name }}</h1>
<h4>{{ $user->email }}</h4>
  @if ($user->articles->isEmpty())
                            <p class="text-danger text-center"><em>{{ __('ui.nessun_articolo') }}</em></p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped table-sm border-0 primary-light-bg w-100">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="fw-bold p-2 primary-light-bg">{{ __('ui.titolo') }}</th>
                                            <th class="fw-bold p-2 primary-light-bg">{{ __('ui.prezzo') }}</th>
                                            <th class="fw-bold p-2 primary-light-bg">{{ __('ui.categorie') }}</th>
                                            <th class="hide fw-bold p-2 primary-light-bg">{{ __('ui.descrizione') }}</th>
                                            <th class="hide fw-bold p-2 primary-light-bg w-15">{{ __('ui.data') }}</th>
                                            <th class="fw-bold p-2 primary-light-bg text-start w-auto">{{ __('ui.azioni') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articles as $article)
                                            <tr>
                                                <td class="p-2 primary-light-bg">{{ $article->title }}</td>
                                                <td class="p-2 primary-light-bg">{{ $article->price }}</td>
                                                <td class="p-2 primary-light-bg">{{ $article->category->name }}</td>
                                                <td class="p-2 hide primary-light-bg">{{ Str::limit($article->description, 50) }}</td>
                                                <td class="p-2 hide primary-light-bg w-15">{{ $article->created_at->format('d/m/Y') }}</td>
                                                <td class="p-2 primary-light-bg text-start w-auto">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="{{ route('article.show', $article) }}"
                                                            class="btn rounded-5 btn-form btn-sm">
                                                            <i class="bi bi-eye dark-text"></i>
                                                        </a>

                                                                

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
 </x-layout>
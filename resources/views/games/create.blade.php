<div class="bg-gray-200 min-h-screen pt-2 font-mono my-16">
    <div class="container mx-auto">
        <div class="inputs w-full max-w-2xl p-6 mx-auto">
            <h2 class="text-2xl text-gray-900">Création d'un jeu</h2>
            <form  action="{{route('jeu.store')}}" method="post" class="mt-6 border-t border-gray-400 pt-4">
                @csrf
                <div class='flex flex-wrap -mx-3 mb-6'>
                    <div class='w-full md:w-full px-3 mb-6'>
                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'
                               for='grid-text-1'>Nom</label>
                        <input
                            class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500'
                            id='grid-text-1' name="nom" value="{{ old('nom') }}" placeholder='Saisir le nom du jeu'
                            required>
                    </div>
                    <div class='w-full md:w-full px-3 mb-6'>
                        <label
                            class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Description</label>
                        <textarea name="description"
                                  class='bg-gray-100 rounded-md border leading-normal resize-none w-full h-20 py-2 px-3 shadow-inner border border-gray-400 font-medium placeholder-gray-700 focus:outline-none focus:bg-white'
                                  required>  {{ old('description') }}</textarea>
                    </div>
                    <div class='w-full md:w-full px-3 mb-6'>
                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Éditeur</label>
                        <div class="flex-shrink w-full inline-block relative">
                            <select name="editeur"  value="{{ old('editeur') }}"
                                    class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                                <option value="">Choisir ...</option>
                                @foreach($editeurs as $editeur)
                                    <option value="{{$editeur->id}}" @if($editeur == old('editeur')) selected @endif>{{$editeur->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class='w-full md:w-full px-3 mb-6'>
                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>Thème</label>
                        <div class="flex-shrink w-full inline-block relative">
                            <select name="theme"  value="{{ old('theme') }}"
                                    class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded">
                                <option value="">choisir ...</option>
                                @foreach($themes as $theme)
                                    <option value="{{$theme->id}}"  @if($theme == old('theme')) selected @endif>{{$theme->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button
                            class="appearance-none bg-gray-200 text-gray-900 px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3"
                            type="submit">Valide
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

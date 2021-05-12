<x-app-layout>
  <div class="py-8 max-w-5xl mx-auto px-2 sm:px-6 lg:px-8">
    <h1 class="uppercase text-center text-3xl font-bold">Categoría: {{ $category->name }}</h1>  
    @foreach ($posts as $post)
        <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
            <img class="w-full h-72 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="{{$post->image->name}}">
            <div class="px-6 py-4">
                <h1 class="font-bold text-xl mb-2"><a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a></h1>
                <div class="text-gray-700 text-base">
                    {{ $post->extract }}
                </div>
            </div>
            <div class="px-6 pt-4 pb-2">
                @foreach ($post->tags as $tag)
                    <a href="" class="inline-block px-3 mb-3 h-6 bg-{{ $tag->color }}-600 text-white rounded-full">{{ $tag->name }}</a>
                @endforeach
            </div>
        </article>
    @endforeach
    <div class="mt-4">
        {{$posts->links()}}
    </div>
  </div>
</x-app-layout>
@extends('layouts.main')

@section('title', $blog->title)

@section('content')

  <section class="bg-gray-100 py-16">

    <div class="container mx-auto px-6 max-w-4xl">

      <!-- Thumbnail -->
      <img src="{{ asset('blog/' . $blog->thumbnail) }}" class="w-full h-80 object-cover rounded-xl mb-8">

      <!-- Title -->
      <h1 class="text-4xl font-bold text-blue-700 mb-4">
        {{ $blog->title }}
      </h1>

      <!-- Date -->
      <p class="text-gray-500 mb-8">
        {{ $blog->created_at->format('d F Y') }}
      </p>

      <!-- Content -->
      <div class="prose max-w-none">
        {!! $blog->content !!}
      </div>

    </div>

  </section>


  <!-- Related Blog -->
  <section class="py-16 bg-white">

    <div class="container mx-auto px-6">

      <h2 class="text-2xl font-bold text-blue-700 mb-8">
        Artikel Terkait
      </h2>

      <div class="grid md:grid-cols-3 gap-8">

        @foreach($relatedBlogs as $related)

          <div class="bg-gray-100 rounded-xl overflow-hidden shadow">

            <img src="{{ asset('blog/' . $related->thumbnail) }}" class="w-full h-40 object-cover">

            <div class="p-4">

              <h3 class="font-semibold text-blue-700 mb-2">
                {{ $related->title }}
              </h3>

              <a href="{{ route('blog.show', $related->slug) }}" class="text-blue-600 text-sm font-semibold">
                Read More →
              </a>

            </div>

          </div>

        @endforeach

      </div>

    </div>

  </section>

@endsection
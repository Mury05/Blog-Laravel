 {{-- <p>Content: {{ $article->body }}</p>  --}}
 <article class="m-5" >
     <a href="/article/{{ $article->id }}" class="text-blue-800 underline" >
         <p>{{ $article['title'] }}</p>
     </a>
     <p class="italic" >{{ $article->user->name }}</p>
 </article>

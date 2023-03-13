@extends('layouts.default')
@section('content')
<style>
    iframe {
        border-radius: 20px !important;
        border: 2px solid #6dabe4;
    }

    button {
        background-color: #6dabe4;
        color: white;
        font-size: 20px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
    }
</style>

<section>
    <div class="container px-5 py-3 my-3">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <h2>Story Telling</h2>
                    <p class="my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius fugit sint laborum recusandae eaque voluptatibus sequi nobis dolore eos nesciunt nihil voluptatum nam ea vitae accusamus nisi iste modi odit consequatur nemo, consectetur tenetur aperiam! Error ipsam quisquam exercitationem at incidunt quam consequatur? Numquam voluptatem ea fuga quisquam laborum provident sequi cupiditate qui! Vel, tempora facilis. Maxime, omnis! Temporibus expedita optio libero repellat, tempore illo consectetur perferendis, aut natus cum ab id sapiente asperiores ipsam nam ullam ut perspiciatis harum voluptas facere! Amet, consectetur aperiam? Provident accusantium exercitationem rerum suscipit! Nam inventore sapiente nihil ratione, ducimus ea dolorem vitae dolores!</p>
                </div>
            </div>
            <div class="col-12">
                <iframe width="100%" height="345" src="https://www.youtube.com/embed/ptssvF8NYnI">
                </iframe>
            </div>
            <div class="col-12 mt-3">
                <div class="text-right">
                    <a href="{{url('/gratitude-story')}}">
                        <button class="px-5 py-2">
                            Gratitude Story
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@endsection
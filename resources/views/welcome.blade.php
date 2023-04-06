<x-user-layout>
    <br>
    <div class="container">
        @if(Session::get('user'))
        <h2 class="text-center">Welkom bij BBC Cartel {{Session::get('user')->name}}</h2>
        <br>
        @endif
        <div class="row justify-content-center gap-2">
            <div class="col-3 d-flex justify-content-center align-items-center border border-danger rounded instagram-card">
                <a href="https://www.instagram.com/bbc_cartel/" class="text-center" style="text-decoration: none" target="_blank">
                    <i class="fa-brands fa-instagram text-danger" style="font-size: 16rem"></i>
                    <p class="bg-dark text-white text-center">@BBC_Cartel</p>
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center border border-primary  rounded discord-card">
                <a href="https://discord.gg/5vJ8pk7uXh" class="text-center" style="text-decoration: none" target="_blank">
                    <i class="fa-brands fa-discord text-primary" style="font-size: 16rem"></i>
                    <p class="bg-dark text-white text-center">@BBC_Cartel</p>
                </a>
            </div>
        </div>
    </div>
</x-user-layout>

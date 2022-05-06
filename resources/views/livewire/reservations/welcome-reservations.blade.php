<form method="POST" wire:submit.prevent="createReservation" class="welcome-reservation__form">
    @csrf
    <h4 class="text-center">
        Choisis une date pour ta réservation
    </h4>
    <div class="text-center welcome-reservation__form__selector">
        <select wire:model.defer="opening_id">
            <option value="0">
                Sélectionne une date...
            </option>
            @foreach($openings as $opening)
                <option wire:key="{{ $opening->id }}" value="{{ $opening->id }}">
                    {{ $opening->date->format('d\/m\/Y') }} - {{ $opening->starting_hour }}
                </option>
            @endforeach
        </select>
    </div>

    @if($show_details)
    <div>
        <h4 class="text-center">Tu as choisi le repas suivant :</h4>
        <div class="flex justify-around flex-wrap">
            <p>
                Date : {{ $opening->date->format('d\/m\/Y') }}
            </p>
            <p>
                Heure : {{ $opening->starting_hour }}
            </p>
            <p>
                Places restantes : {{ $opening->seats - $opening->valid_reservations()->count() }}
            </p>
        </div>
    </div>
    @endif

    <div>
        <div class="flex justify-start mt-10 mb-5">
            <h4 class="article-sidebar__content__mask-subtitle">
                Nombre de places à reserver :
            </h4>
            <p class="article-sidebar__content__mask-number ml-5">
                x {{ $seats_number }}
            </p>
            <div class="ml-5">
                <p class="article-sidebar__content__mask-btn" wire:click.prevent.stop="updateSeatsNumber('up')">
                    <i class="fas fa-plus"></i>
                </p>
                <p class="article-sidebar__content__mask-btn" wire:click.prevent.stop="updateSeatsNumber('down')">
                    <i class="fas fa-minus"></i>
                </p>
            </div>
            <input type="hidden" name="seats_number" wire:model="seats_number">
        </div>
    </div>
</form>

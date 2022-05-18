<div class="datepicker">
    <input type="text" name="selected_date" wire:model="selected_date" wire:click.prevent="showDateSelector">
    <div class="datepicker__selector" @if(!$show_selector) style="display: none;" @endif>
        <div class="datepicker__close" wire:click="closeSelector" wire:keydown.escape="closeSelector">
            &#x2715;
        </div>
        <div class="flex justify-between datepicker__selector__year">
            <div>
                @if($selected_year > Carbon\Carbon::now()->format('Y'))
                <button wire:click.prevent="changeYear('down')"><</button>
                @endif
            </div>
            <p>
                {{ $selected_year }}
            </p>
            <div>
                @if($selected_year < $max_year)
                <button wire:click.prevent="changeYear('up')">></button>
                @endif
            </div>
        </div>
        <div class="grid grid-cols-7 datepicker__selector__month">
            <div class="text-center hover:text-gray-800 transition" wire:click.prevent="changeMonth('down')" style="cursor: pointer;">
                <button><</button>
            </div>
            @php
            $text_months_localized = [
                '01' => __('welcome.month-january'),
                '02' => __('welcome.month-february'),
                '03' => __('welcome.month-march'),
                '04' => __('welcome.month-april'),
                '05' => __('welcome.month-may'),
                '06' => __('welcome.month-june'),
                '07' => __('welcome.month-july'),
                '08' => __('welcome.month-august'),
                '09' => __('welcome.month-september'),
                '10' => __('welcome.month-october'),
                '11' => __('welcome.month-november'),
                '12' => __('welcome.month-december'),
            ];
            @endphp
            <p class="text-center col-span-5">
                {{ $text_months_localized[str_pad($selected_month, 2, 0, STR_PAD_LEFT)] }}
            </p>
            <div class="text-center hover:text-gray-800 transition" wire:click.prevent="changeMonth('up')" style="cursor: pointer;">
                <button>></button>
            </div>
        </div>

        <div class="datepicker__selector__days">
            <table class="w-full">
                <tr class="grid grid-cols-7 text-center">
                    <th>Mo</th>
                    <th>Tu</th>
                    <th>We</th>
                    <th>Th</th>
                    <th>Fr</th>
                    <th>Sa</th>
                    <th>Su</th>
                </tr>
                <tr class="grid grid-cols-7 text-center mb-2">
                    @for($i = 0; $i < 7; $i ++)
                        @if(isset($days_with_info[$i]))
                            @if(Carbon\Carbon::parse($days_with_info[$i]['day'].'-'.$selected_month.'-'.$selected_year) >= Carbon\Carbon::now() && $days_with_info[$i]['with_opening'] == '1')
                                <td class="datepicker__selector__days__active" wire:click="selectDate('{{ $days_with_info[$i]['day'] }}')" wire:key="daypicker-{{ $i }}">
                                    {{ $days_with_info[$i]['day'] }}
                                </td>
                            @else
                                <td class="datepicker__selector__days__inactive" wire:key="daypicker-{{ $i }}">{{ $days_with_info[$i]['day'] }}</td>
                            @endif
                        @else
                            <td wire:key="daypicker-{{ $i }}"></td>
                        @endif
                    @endfor
                </tr>
                <tr class="grid grid-cols-7 text-center mb-2">
                    @for($i = 7; $i < 14; $i ++)
                        @if(isset($days_with_info[$i]))
                            @if(Carbon\Carbon::parse($days_with_info[$i]['day'].'-'.$selected_month.'-'.$selected_year) >= Carbon\Carbon::now() && $days_with_info[$i]['with_opening'] == '1')
                                <td class="datepicker__selector__days__active" wire:click.prevent="selectDate('{{ $days_with_info[$i]['day'] }}')" wire:key="daypicker-{{ $i }}">
                                    {{ $days_with_info[$i]['day'] }}
                                </td>
                            @else
                                <td class="datepicker__selector__days__inactive">{{ $days_with_info[$i]['day'] }}</td>
                            @endif
                        @else
                            <td></td>
                        @endif
                    @endfor
                </tr>
                <tr class="grid grid-cols-7 text-center mb-2">
                    @for($i = 14; $i < 21; $i ++)
                        @if(isset($days_with_info[$i]))
                            @if(Carbon\Carbon::parse($days_with_info[$i]['day'].'-'.$selected_month.'-'.$selected_year) >= Carbon\Carbon::now() && $days_with_info[$i]['with_opening'] == '1')
                                <td class="datepicker__selector__days__active" wire:click.prevent="selectDate('{{ $days_with_info[$i]['day'] }}')" wire:key="daypicker-{{ $i }}">
                                    {{ $days_with_info[$i]['day'] }}
                                </td>
                            @else
                                <td class="datepicker__selector__days__inactive">{{ $days_with_info[$i]['day'] }}</td>
                            @endif
                        @else
                            <td></td>
                        @endif
                    @endfor
                </tr>
                <tr class="grid grid-cols-7 text-center mb-2">
                    @for($i = 21; $i < 28; $i ++)
                        @if(isset($days_with_info[$i]))
                            @if(Carbon\Carbon::parse($days_with_info[$i]['day'].'-'.$selected_month.'-'.$selected_year) >= Carbon\Carbon::now() && $days_with_info[$i]['with_opening'] == '1')
                                <td class="datepicker__selector__days__active" wire:click.prevent="selectDate('{{ $days_with_info[$i]['day'] }}')" wire:key="daypicker-{{ $i }}">
                                    {{ $days_with_info[$i]['day'] }}
                                </td>
                            @else
                                <td class="datepicker__selector__days__inactive">{{ $days_with_info[$i]['day'] }}</td>
                            @endif
                        @else
                            <td></td>
                        @endif
                    @endfor
                </tr>
                @if(sizeof($days_with_info) >= 28)
                <tr class="grid grid-cols-7 text-center mb-2">
                    @for($i = 28; $i < min(35, sizeof($days_with_info)); $i ++)
                        @if(isset($days_with_info[$i]))
                            @if(Carbon\Carbon::parse($days_with_info[$i]['day'].'-'.$selected_month.'-'.$selected_year) >= Carbon\Carbon::now() && $days_with_info[$i]['with_opening'] == '1')
                                <td class="datepicker__selector__days__active" wire:click.prevent="selectDate('{{ $days_with_info[$i]['day'] }}')" wire:key="daypicker-{{ $i }}">
                                    {{ $days_with_info[$i]['day'] }}
                                </td>
                            @else
                                <td class="datepicker__selector__days__inactive">{{ $days_with_info[$i]['day'] }}</td>
                            @endif
                        @else
                            <td></td>
                        @endif
                    @endfor
                </tr>
                @endif
                @if(sizeof($days_with_info) >= 35)
                <tr class="grid grid-cols-7 text-center mb-2">
                    @for($i = 35; $i < min(42, sizeof($days_with_info)); $i ++)
                        @if(isset($days_with_info[$i]))
                            @if(Carbon\Carbon::parse($days_with_info[$i]['day'].'-'.$selected_month.'-'.$selected_year) >= Carbon\Carbon::now() && $days_with_info[$i]['with_opening'] == '1')
                                <td class="datepicker__selector__days__active" wire:click.prevent="selectDate('{{ $days_with_info[$i]['day'] }}')" wire:key="daypicker-{{ $i }}">
                                    {{ $days_with_info[$i]['day'] }}
                                </td>
                            @else
                                <td class="datepicker__selector__days__inactive">{{ $days_with_info[$i]['day'] }}</td>
                            @endif
                        @else
                            <td></td>
                        @endif
                    @endfor
                </tr>
                @endif
                @if(sizeof($days_with_info) >= 42)
                <tr class="grid grid-cols-7 text-center mb-2">
                    @for($i = 42; $i < sizeof($days_with_info); $i ++)
                        @if(isset($days_with_info[$i]))
                            @if(Carbon\Carbon::parse($days_with_info[$i]['day'].'-'.$selected_month.'-'.$selected_year) >= Carbon\Carbon::now() && $days_with_info[$i]['with_opening'] == '1')
                                <td class="datepicker__selector__days__active" wire:click.prevent="selectDate('{{ $days_with_info[$i]['day'] }}')" wire:key="daypicker-{{ $i }}">
                                    {{ $days_with_info[$i]['day'] }}
                                </td>
                            @else
                                <td class="datepicker__selector__days__inactive">{{ $days_with_info[$i]['day'] }}</td>
                            @endif
                        @else
                            <td></td>
                        @endif
                    @endfor
                </tr>
                @endif
            </table>
        </div>
    </div>
</div>

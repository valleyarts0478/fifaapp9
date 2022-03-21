
                @if($value['section'] === 1)
                {{$value['section']}}<span class="text-xl">st</span>
                @elseif($value['section'] === 2)
                {{$value['section']}}<span class="text-xl">nd</span>
                @elseif($value['section'] === 3)
                {{$value['section']}}<span class="text-xl">rd</span>
                @elseif($value['section'] >= 4)
                {{$value['section']}}<span class="text-xl">th</span>
                @endif


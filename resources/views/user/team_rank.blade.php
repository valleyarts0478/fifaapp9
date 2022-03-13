<x-front.app>
<div class="max-w-4xl py-24 mx-auto sm:px-6 lg:px-8">
  <ul class="tab">
    <li><a href="#first">RAL-E 1部</a></li>
    <li><a href="#second">RAL-E 2部</a></li>
  </ul>
    @if($count === 0)
    順位はありません。
    @else
 <div id="first" class="area">

    <div class="scroll-box">
        <table>
            <thead>
                <tr>
                  <th class="_sticky">順/Team</th>
                  <th class="px-1 py-2">P</th>
                  <th class="px-1 py-2">試</th>
                  <th class="px-1 py-2">W</th>
                  <th class="px-1 py-2">L</th>
                  <th class="px-1 py-2">D</th>
                  <th class="px-1 py-2">得</th>
                  <th class="px-1 py-2">失</th>
                  <th class="px-1 py-2">差</th>
                </tr>
            </thead>
            <?php $rank = 1; 
            $cnt = 1;
            $bef_point = 0;
            ?>
     @foreach($convention_results as $results)            
            <?php 
      //前回と同順位の場合は、順位を加算しない
      if($bef_point != $results->game_point){
            $rank = $cnt; 
        } ?>
        @if($results['league_id'] === 1)
          <tr>
            <th class="_sticky">
                <div class="w-12 text-md p-1 mx-auto mb-2 rounded-full bg-ral-300">{{$rank}}位</div>
                
                @foreach ($team_names as $team_name)
                 @if($team_name->team_name === $results->team_name)
                 <img class="inline w-8 h-8" src="{{ asset('storage/teams/logo/' . $team_name->team_logo_url) }}" alt="team_logo">
                 @endif
                @endforeach
                <span>{{$results->team_name}}</span>
            </th>
            <td>{{$results->game_point}}</td>
            <td>{{$results->game_count}}</td>
            <td>{{$results->win}}</td>
            <td>{{$results->lose}}</td>
            <td>{{$results->draw}}</td>
            <td>{{$results->gain}}</td>
            <td>{{$results->loss}}</td>
            <td>{{$results->numbers_diff}}</td>
          </tr>
              <?php $bef_point = $results->game_point;
              $cnt++; ?>
              @endif
              @endforeach
        </table>
      </div>
      <x-front.smartphone />
    </div>
  @endif
    @if($flag)
    @if($count === 0)
    順位はありません。
    @else
    <!--second start-->
    <div id="second" class="area">
 
      <div class="scroll-box">
        <table>
            <thead>
                <tr>
                  <th class="_sticky">順/Team</th>
                  <th class="px-1 py-2">P</th>
                  <th class="px-1 py-2">試</th>
                  <th class="px-1 py-2">W</th>
                  <th class="px-1 py-2">L</th>
                  <th class="px-1 py-2">D</th>
                  <th class="px-1 py-2">得</th>
                  <th class="px-1 py-2">失</th>
                  <th class="px-1 py-2">差</th>
                </tr>
            </thead>
            <?php $rank = 1; 
            $cnt = 1;
            $bef_point = 0;
            ?>
     @foreach($convention_results as $results)            
            <?php 
      //前回と同順位の場合は、順位を加算しない
      if($bef_point != $results->game_point){
            $rank = $cnt; 
        } ?>
        @if($results['league_id'] === 2)
          <tr>
            <th class="_sticky">
                <div class="w-12 text-md p-1 mx-auto mb-2 rounded-full bg-yellow-400">{{$rank}}位</div>
                
                @foreach ($team_names as $team_name)
                 @if($team_name->team_name === $results->team_name)
                 <img class="inline w-8 h-8" src="{{ asset('storage/teams/logo/' . $team_name->team_logo_url) }}" alt="team_logo">
                 @endif
                @endforeach
                <span>{{$results->team_name}}</span>
            </th>
            <td>{{$results->game_point}}</td>
            <td>{{$results->game_count}}</td>
            <td>{{$results->win}}</td>
            <td>{{$results->lose}}</td>
            <td>{{$results->draw}}</td>
            <td>{{$results->gain}}</td>
            <td>{{$results->loss}}</td>
            <td>{{$results->numbers_diff}}</td>
          </tr>
              <?php $bef_point = $results->game_point;
              $cnt++; ?>
              @endif
              @endforeach     
        </table>
      </div>
      <x-front.smartphone />
    </div><!--second area end-->
    
    @endif
  @endif
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="{{mix('js/tab.js')}}"></script>
</x-front.app>
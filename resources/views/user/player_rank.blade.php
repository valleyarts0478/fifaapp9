<x-front.app>
   <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">



    <ul class="tab">
      <li><a href="#first">RAL-E 1部</a></li>
      <li><a href="#second">RAL-E 2部</a></li>
    </ul>
      @if($goal_cnt === 0)
        得点はありません。
      
      @else
      <div id="first" class="area">
        <!-- text - start -->
        <div class="mb-4 md:mb-8">
          <h2 class="bg-gray-100 py-2 text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">GoalRanking</h2>
        </div>
        <!-- text - end -->

          <!--１部得点王-->
    <table class="table-auto mx-auto text-center md:text-lg md:w-full">
      <thead>
        <tr>
          <th class="px-1 py-2">Rank</th>
          <th class="px-12 py-2">player</th>
          <th class="px-1 py-2">G</th>
          <th class="px-8 py-2">team</th>
        </tr>
      </thead>
      <?php $rank = 1; 
            $cnt = 1;
            $bef_point = 0;
      ?>
      @foreach($goal_ranking as $goal_rank)
        <?php 
        //前回と同順位の場合は、順位を加算しない
        if($bef_point != $goal_rank['goals']){
            $rank = $cnt; 
        } ?>
        @if($goal_rank['league_id'] === 1)
      <tbody>
        @if ($goal_rank['goals'] >= 1)
        <tr>
          <td class="border px-4 py-2"><span class="text-md p-1 mr-2 rounded-full bg-ral-300">{{$rank}}位</span></td>
          <td class="border px-4 py-2">{{$goal_rank['player_name']}}</td>
          <td class="border px-4 py-2">{{$goal_rank['goals']}}</td>        
          <td class="border px-4 py-2"><img class="w-4 h-4 inline-table" src="{{ asset('storage/teams/logo/' . $goal_rank['team_logo_url'])}}"><span class="ml-1">{{$goal_rank['team_abb']}}</span></td>
        </tr>
        @endif
        <?php $bef_point = $goal_rank['goals'];
        $cnt++; ?>
      </tbody>
        @endif
      @endforeach
    </table>
    @endif

    @if($assists_cnt === 0)
        アシストはありません。
      
      @else
            <!-- text - start -->
            <div class="mb-4 mt-8 md:mb-8">
              <h2 class="bg-gray-100 py-2 text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">AssistRanking</h2>
            </div>
            <!-- text - end -->
            <!--1部アシスト王-->
            <table class="table-auto mx-auto text-center md:text-lg md:w-full">
              <thead>
                <tr>
                  <th class="px-1 py-2">Rank</th>
                  <th class="px-12 py-2">player</th>
                  <th class="px-1 py-2">A</th>
                  <th class="px-8 py-2">team</th>
                </tr>
              </thead>
              <?php $rank = 1; 
                    $cnt = 1;
                    $bef_point = 0;
              ?>
              
              @foreach($assists_ranking as $assist_rank)
                <?php 
                //前回と同順位の場合は、順位を加算しない
                if($bef_point != $assist_rank['assists']){
                    $rank = $cnt; 
                } ?>
                @if($assist_rank['league_id'] === 1)
                @if ($assist_rank['assists'] >= 1)
              <tbody>
                <tr>
                  <td class="border px-4 py-2"><span class="text-md p-1 mr-2 rounded-full bg-ral-300">{{$rank}}位</span></td>
                  <td class="border px-4 py-2">{{$assist_rank['player_name']}}</td>
                  <td class="border px-4 py-2">{{$assist_rank['assists']}}</td>
                  <td class="border px-4 py-2"><img class="w-4 h-4 inline-table" src="{{ asset('storage/teams/logo/' . $assist_rank['team_logo_url'])}}"><span class="ml-1">{{$assist_rank['team_abb']}}</span></td>
                </tr>
                <?php $bef_point = $assist_rank['assists'];
                $cnt++; ?>
              </tbody>
              @endif
              @endif
              @endforeach
            </table>
      <!--/area--></div>
    @endif
    
      
   @if($flag)
    @if($goal_cnt === 0)
        得点はありません。
      
      @else
      <div id="second" class="area">
        <!-- text - start -->
        <div class="mb-4 md:mb-8">
          <h2 class="bg-gray-100 py-2 text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">GoalRanking</h2>
        </div>
        <!-- text - end -->
    <!--2部得点王-->
    <table class="table-auto mx-auto text-center md:text-lg md:w-full">
      <thead>
        <tr>
          <th class="px-1 py-2">Rank</th>
          <th class="px-12 py-2">player</th>
          <th class="px-1 py-2">G</th>
          <th class="px-8 py-2">team</th>
        </tr>
      </thead>
      <?php $rank = 1; 
            $cnt = 1;
            $bef_point = 0;
      ?>
      @foreach($goal_ranking as $goal_rank)
        <?php 
        //前回と同順位の場合は、順位を加算しない
        if($bef_point != $goal_rank['goals']){
            $rank = $cnt; 
        } ?>
        @if($goal_rank['league_id'] === 2)
        @if ($goal_rank['goals'] >= 1)
      <tbody>
        <tr>
          <td class="border px-4 py-2"><span class="text-md p-1 mr-2 rounded-full bg-ral-300">{{$rank}}位</span></td>
          <td class="border px-4 py-2">{{$goal_rank['player_name']}}</td>
          <td class="border px-4 py-2">{{$goal_rank['goals']}}</td>
          <td class="border px-4 py-2"><img class="w-4 h-4 inline-table" src="{{ asset('storage/teams/logo/' . $goal_rank['team_logo_url'])}}"><span class="ml-1">{{$goal_rank['team_abb']}}</span></td>
        </tr>
        <?php $bef_point = $goal_rank['goals'];
        $cnt++; ?>
      </tbody>
      @endif
      @endif
      @endforeach

    </table>
    @endif
  @endif
  
  @if($flag)
    @if($assists_cnt === 0)
        得点はありません。
    @else
     <!-- text - start -->
 <div class="mb-4 mt-8 md:mb-8">
  <h2 class="bg-gray-100 py-2 text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">AssistRanking</h2>
</div>
<!-- text - end -->
    <!--2部アシスト王-->
    <table class="table-auto mx-auto text-center md:text-lg md:w-full">
      <thead>
        <tr>
          <th class="px-1 py-2">Rank</th>
          <th class="px-12 py-2">player</th>
          <th class="px-1 py-2">A</th>
          <th class="px-8 py-2">team</th>
        </tr>
      </thead>
      <?php $rank = 1; 
            $cnt = 1;
            $bef_point = 0;
      ?>
      @foreach($assists_ranking as $assist_rank)
        <?php 
        //前回と同順位の場合は、順位を加算しない
        if($bef_point != $assist_rank['assists']){
            $rank = $cnt; 
        } ?>
        @if($assist_rank['league_id'] === 2)
        @if ($assist_rank['assists'] >= 1)
      <tbody>
        <tr>
          <td class="border px-4 py-2"><span class="text-md p-1 mr-2 rounded-full bg-ral-300">{{$rank}}位</span></td>
          <td class="border px-4 py-2">{{$assist_rank['player_name']}}</td>
          <td class="border px-4 py-2">{{$assist_rank['assists']}}</td>
          <td class="border px-4 py-2"><img class="w-4 h-4 inline-table" src="{{ asset('storage/teams/logo/' . $assist_rank['team_logo_url'])}}"><span class="ml-1">{{$assist_rank['team_abb']}}</span></td>
        </tr>
        <?php $bef_point = $assist_rank['assists'];
        $cnt++; ?>
      </tbody>
      @endif
      @endif
      @endforeach
    </table>
    @endif
      <!--/area--></div>
 @endif
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="{{mix('js/tab.js')}}"></script>
</x-front.app>
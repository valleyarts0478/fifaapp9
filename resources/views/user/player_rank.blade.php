<x-front.app>
<div class="max-w-4xl py-8 mx-auto sm:px-6 lg:px-8">

    <ul class="tab">
      <li><a href="#first">RAL-E1 GOAL</a></li>
      <li><a href="#second">RAL-E1 ASSIST</a></li>
      <li><a href="#goal2">RAL-E2 GOAL</a></li>
      <li><a href="#assist2">RAL-E2 ASSIST</a></li>
    </ul>
      {{-- @if($goal_cnt)
       得点はありません。 
      @else --}}
    <div id="first" class="area">

        <!-- text - start -->
        <div class="mb-4 md:mb-8">
          <h2 class="bg-gray-100 py-2 text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">GoalRanking</h2>
        </div>
        <!-- text - end -->


         <div class="max-w-2xl mx-auto p-4">
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
                @if ($goal_rank['goals'] >= 1 && $rank <= 10)
                  <div class="rounded-lg border border-gray-300 mb-2 p-4">
                    <div class="w-8"><span class="text-xl font-bold text-ral-400">{{$rank}}</span><span class="text-xs">位</span></div>
                          <div class="flex justify-around w-full">
                            <h2 class="w-32 mt-3 text-md text-left font-bold">
                              {{$goal_rank['player_name']}}
                              <div class="text-sm">GOAL:<span class="text-md">{{$goal_rank['goals']}}</span></div>
                            </h2> 
                            <img class="w-16 ml-auto" src="{{ asset('storage/teams/logo/' . $goal_rank['team_logo_url'])}}">
                          </div>
                    
                          @foreach ($p_names as $value)
                          @if($goal_rank['player_name'] === $value->player_name)
                          <span class="text-xs">{{$value->position->position_name}}</span>
                          <span class="text-xs">NO.{{$value->player_no}}</span>
                          @endif
                          @endforeach 

                        <?php $bef_point = $goal_rank['goals'];
                          $cnt++; 
                        ?>
                </div>
                @endif
                @endif
              @endforeach
            </div>

      </div><!--/area-->
      {{-- @endif --}}
     
      <!--1部アシストランキング-START-->
    <div id="second" class="area">
     @if($assists_cnt === 0)
     アシストはありません。
     @else
         <!-- text - start -->
         <div class="mb-4 md:mb-8">
          <h2 class="bg-gray-100 py-2 text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">AssistRanking</h2>
        </div>
         <!-- text - end -->
     @endif

   <div class="max-w-2xl mx-auto p-4">
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
        @if ($assist_rank['assists'] >= 1 && $rank <= 10)                          


  <div class="rounded-lg border border-gray-300 mb-2 p-4">
    <div class="w-8"><span class="text-xl font-bold text-ral-400">{{$rank}}</span><span class="text-xs">位</span></div>
          <div class="flex justify-around w-full">
            <h2 class="w-32 mt-3 text-md text-left font-bold">
              {{$assist_rank['player_name']}}
              <div class="text-sm">ASSIST:<span class="text-md">{{$assist_rank['assists']}}</span></div>
            </h2> 
            <img class="w-16 ml-auto" src="{{ asset('storage/teams/logo/' . $assist_rank['team_logo_url'])}}">
          </div>
  
          @foreach ($p_names as $value)
          @if($assist_rank['player_name'] === $value->player_name)
          <span class="text-xs">{{$value->position->position_name}}</span>
          <span class="text-xs">NO.{{$value->player_no}}</span>
          @endif
          @endforeach 

          <?php $bef_point = $assist_rank['assists'];
          $cnt++; 
          ?>
    </div>
      @endif
      @endif
      @endforeach
  </div>
    </div><!--secondarea-->
<!--1部アシストランキング-END-->

<!--2部goal-START-->
<div id="goal2" class="area">
  <!-- text - start -->
  <div class="mb-4 md:mb-8">
    <h2 class="bg-gray-100 py-2 text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">GoalRanking</h2>
  </div>
  <!-- text - end -->

  <div class="max-w-2xl mx-auto p-4">
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
  @if ($goal_rank['goals'] >= 1 && $rank <= 10)
    <div class="rounded-lg border border-gray-300 mb-2 p-4">
      <div class="w-8"><span class="text-xl font-bold text-ral-400">{{$rank}}</span><span class="text-xs">位</span></div>
            <div class="flex justify-around w-full">
              <h2 class="w-32 mt-3 text-md text-left font-bold">
                {{$goal_rank['player_name']}}
                <div class="text-sm">GOAL:<span class="text-md">{{$goal_rank['goals']}}</span></div>
              </h2> 
              <img class="w-16 ml-auto" src="{{ asset('storage/teams/logo/' . $goal_rank['team_logo_url'])}}">
            </div>
      
            @foreach ($p_names as $value)
            @if($goal_rank['player_name'] === $value->player_name)
            <span class="text-xs">{{$value->position->position_name}}</span>
            <span class="text-xs">NO.{{$value->player_no}}</span>
            @endif
            @endforeach 

          <?php $bef_point = $goal_rank['goals'];
            $cnt++; 
          ?>
  </div>
  @endif
  @endif
@endforeach
</div>
</div><!--/area-->
<!--2部goal-END-->

<!--assist2-START-->
<div id="assist2" class="area">
  <!-- text - start -->
  <div class="mb-4 md:mb-8">
    <h2 class="bg-gray-100 py-2 text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">AssistRanking</h2>
  </div>
  <!-- text - end -->


  <div class="max-w-2xl mx-auto p-4">
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
    @if ($assist_rank['assists'] >= 1 && $rank <= 10)                          


<div class="rounded-lg border border-gray-300 mb-2 p-4">
<div class="w-8"><span class="text-xl font-bold text-ral-400">{{$rank}}</span><span class="text-xs">位</span></div>
      <div class="flex justify-around w-full">
        <h2 class="w-32 mt-3 text-md text-left font-bold">
          {{$assist_rank['player_name']}}
          <div class="text-sm">ASSIST:<span class="text-md">{{$assist_rank['assists']}}</span></div>
        </h2> 
        <img class="w-16 ml-auto" src="{{ asset('storage/teams/logo/' . $assist_rank['team_logo_url'])}}">
      </div>

      @foreach ($p_names as $value)
      @if($assist_rank['player_name'] === $value->player_name)
      <span class="text-xs">{{$value->position->position_name}}</span>
      <span class="text-xs">NO.{{$value->player_no}}</span>
      @endif
      @endforeach 

      <?php $bef_point = $assist_rank['assists'];
      $cnt++; 
      ?>
</div>
  @endif
  @endif
  @endforeach
</div>
</div><!--secondarea-->
<!--assist2-END-->








</div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="{{mix('js/tab.js')}}"></script>
</x-front.app>
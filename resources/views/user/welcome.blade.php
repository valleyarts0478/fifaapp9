<x-front.app>

    <div class="max-w-screen-lg py-4 mx-auto">
        <div class="container md:px-8 mx-auto">
            <section
                class="min-h-96 flex justify-center items-center flex-1 shrink-0 bg-gray-100 overflow-hidden shadow-lg relative py-16 md:py-20 xl:py-48">
                <!-- image - start -->
                <img src="{{ asset('storage/top/' . 'rale_top.jpg') }}" loading="lazy" alt="ral-e"
                    class="w-full h-full object-cover object-center absolute inset-0" />
                <!-- image - end -->

                <!-- overlay - start -->
                {{-- <div class="bg-ral-400 mix-blend-multiply opacity-30 absolute inset-0"></div> --}}
                <!-- overlay - end -->

                <!-- text start -->
                <div class="sm:max-w-xl flex flex-col items-center relative p-4">
                    <p class="text-white text-lg sm:text-xl text-center mb-4 md:mb-8">FIFA PRO-CLUB</p>
                    <h1 class="text-white text-4xl sm:text-5xl md:text-6xl font-bold text-center mb-8 md:mb-12">WELCOME
                        to RAL-E</h1>
                    <div class="w-full flex flex-col sm:flex-row sm:justify-center gap-2.5">
                        <a href="/recruitment"
                            class="inline-block bg-ral-300 active:bg-indigo-700 focus-visible:ring ring-ral-300 text-black text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">参加チーム募集中！</a>

                        <a href="/regulation"
                            class="inline-block bg-gray-200 hover:bg-gray-300 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700 text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">ルールブック</a>
                    </div>
                </div>
                <!-- text end -->
            </section>
            <div class="w-full h-12 leading-8 py-2 text-xl text-center bg-ral-300">FC25・PS5版クラブで開催</div>
            <!--slider start-->
            <div id="swiper-teamlist" class="swiper-card l-section">
                <div class="l-inner">
                    <div class="text-center text-xl">
                        {{ $convention->convention_no }}
                    </div>
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach ($conventionsResults as $team_owner)
                                <a href="#" class="swiper-slide">
                                    <article class="slide">
                                        @foreach ($team_names as $team_name)
                                            @if ($team_name->team_name === $team_owner->team_name)
                                                <div class="slide-media img-cover"><img
                                                        src="{{ asset('storage/teams/logo/' . $team_name->team_logo_url) }}"
                                                        alt="{{ $team_name->team_logo_url }}"></div>
                                            @endif
                                        @endforeach
                                        <div class="slide-content text-center">
                                            <div class="slide-team">{{ $team_owner->team_name }}</div>
                                            <div class="slide-title test">
                                                <div class="flex flex-wrap justify-center">
                                                    <div class="px-2">勝</div>
                                                    <div class="px-2">敗</div>
                                                    <div class="px-2">分</div>
                                                </div>
                                                <div class="flex flex-wrap justify-center">
                                                    <div class="px-3 leading-5 text-xl">{{ $team_owner->win }}</div>
                                                    <div class="px-3 leading-5 text-xl">{{ $team_owner->lose }}</div>
                                                    <div class="px-3 leading-5 text-xl">{{ $team_owner->draw }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </a>
                            @endforeach
                        </div><!-- /swiper-wrapper -->
                    </div><!-- /swiper -->
                </div>
            </div>
            <!--slider end-->

            <section class="w-full max-4xl p-8 text-gray-600 body-font">
                <div class="text-center">
                    <h3 class="w-full h-12 leading-8 py-2 text-xl text-center border-b border-gray-400">Infomation</h3>
                    @foreach ($infolist as $info)
                        <ul>
                            <li class="border-dashed border-b text-md text-blue-400 border-gray-400 p-2 m-2">
                                <a href="{{ route('user.infolist.show', $info->id) }}"><i
                                        class="-ml-8 text-ral-400 fa-solid fa-clipboard-check"></i><span
                                        class="ml-4">{{ $info->title }}</span></a>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </section>

            <section class="text-gray-600 body-font">
                <div class="container px-4 py-4 mx-auto">
                    <div class="w-full h-12 leading-8 py-2 text-xl text-center border-b border-gray-400">menu</div>
                    <div class="font-bold flex flex-wrap -m-4">

                        @if ($today > $last_date)
                            <div class="p-4 md:w-1/3">
                                <div class="min-h-96 flex justify-center items-center py-4 md:py-4">
                                    <a href="/current_competitions">
                                        <img class="w-full" src="{{ asset('storage/top/' . 'team_list_bn.jpg') }}"
                                            alt="current_competitions">
                                    </a>
                                    <p class="absolute top-50 left-50 text-xl md:text-base lg:text-xl text-white"><a
                                            href="/current_competitions">リーグ戦結果</a></p>
                                </div>
                            </div>
                            @elseif ($last_date === "offseason")
                        @endif                    

                        <div class="p-4 md:w-1/3">
                            <div class="min-h-96 flex justify-center items-center py-4 md:py-4">
                                <a href="/team_list">
                                    <img class="w-full" src="{{ asset('storage/top/' . 'team_list_bn.jpg') }}"
                                        alt="team_list">
                                </a>
                                <p class="absolute top-50 left-50 text-xl md:text-base lg:text-xl text-white"><a
                                        href="/team_list">TEAM LIST</a></p>
                            </div>
                        </div>

                        <div class="p-4 md:w-1/3">
                            <div class="min-h-96 flex justify-center items-center py-4 md:py-4">
                                <a href="/team_rank">
                                    <img class="w-full" src="{{ asset('storage/top/' . 'team_ranking_bn.jpg') }}"
                                        alt="team_rank">
                                </a>
                                <p class="absolute top-50 left-50 text-xl md:text-base lg:text-xl text-white"><a
                                        href="/team_rank">TEAM RANK</a></p>
                            </div>
                        </div>

                        <div class="p-4 md:w-1/3">
                            <div class="min-h-96 flex justify-center items-center py-4 md:py-4">
                                <a href="/player_rank_total">
                                    <img class="w-full" src="{{ asset('storage/top/' . 'team_player_rank_bn.jpg') }}"
                                        alt="player_rank_total">
                                </a>
                                <p class="absolute top-50 left-50 text-xl md:text-base lg:text-xl text-white"><a
                                        href="/player_rank_total">PLAYER RANK</a></p>
                            </div>
                        </div>

                        <div class="p-4 md:w-1/3">
                            <div class="min-h-96 flex justify-center items-center py-4 md:py-4">
                                <a href="/schedule_list">
                                    <img class="w-full" src="{{ asset('storage/top/' . 'schedule_bn.jpg') }}"
                                        alt="schedule_list">
                                </a>
                                <p class="absolute top-50 left-50 text-xl md:text-base lg:text-xl text-white"><a
                                        href="/schedule_list">SCHEDULE LIST</a></p>
                            </div>
                        </div>

                        <div class="p-4 md:w-1/3">
                            <div class="min-h-96 flex justify-center items-center py-4 md:py-4">
                                <a href="/player_recruitment">
                                    <img class="w-full" src="{{ asset('storage/top/' . 'team_list_bn.jpg') }}"
                                        alt="player_recruitment">
                                </a>
                                <p class="absolute top-50 left-50 text-xl md:text-base lg:text-xl text-white"><a
                                        href="/player_recruitment">RAL-E参戦チームに<br>所属したい</a></p>
                            </div>
                        </div>

                        <div class="p-4 md:w-1/3">
                            <div class="min-h-96 flex justify-center items-center py-4 md:py-4">
                                <a href="/past_competitions">
                                    <img class="w-full" src="{{ asset('storage/top/' . 'schedule_bn.jpg') }}"
                                        alt="schedule_list">
                                </a>
                                <p class="absolute top-50 left-50 text-xl md:text-base lg:text-xl text-white"><a
                                        href="/past_competitions">過去大会結果</a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>

    </div>
    <script src="{{ mix('js/swiper.js') }}"></script>
</x-front.app>

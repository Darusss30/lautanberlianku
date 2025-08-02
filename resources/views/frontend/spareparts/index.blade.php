@extends('frontend.main_master')

@section('content')

@section('title')
Sparepart - Lautan Berlian E-Commerce
@endsection

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- ============================================== BREADCRUMB ============================================== -->
                <div class="breadcrumb">
                    <div class="container-fluid">
                        <div class="breadcrumb-inner">
                            <ul class="list-inline list-unstyled">
                                <li><a href="{{ url('/') }}">Beranda</a></li>
                                <li class='active'>Sparepart</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================== BREADCRUMB : END ============================================== -->

                <!-- ============================================== SPAREPART FILTER SECTION ============================================== -->
                <div class="sparepart-filter-section">
                    <div class="container-fluid">
                        <div class="row">
                            @foreach($sparepartSubCategories as $subcategory)
                            <div class="col-md-2 col-sm-4 col-xs-6">
                                <div class="sparepart-category-icon category-filter" data-category="{{ $subcategory->id }}">
                                    <div class="category-content">
                                        @if($subcategory->subcategory_name == 'Interior')
                                            <div class="custom-interior-logo">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="120" height="72" viewBox="0 0 53.205 35.498">
                                                    <g id="Group_111" data-name="Group 111" transform="translate(-655.772 -773.032)">
                                                        <path fill="currentColor" id="Path_298" data-name="Path 298" d="M708.976,790.577a.829.829,0,0,0-.1.172,3.579,3.579,0,0,1-3.6,2.714c-1.783.009-3.567,0-5.35.009a2.215,2.215,0,0,0-.8.16,8.884,8.884,0,0,1-6.913,0,1.813,1.813,0,0,0-2.62,1.115c-.505,1.646-1.184,3.244-1.614,4.907a15.459,15.459,0,0,0-.277,3.189c-.042.984,0,1.972-.013,2.958a2.652,2.652,0,0,1-2.726,2.721q-2.6.023-5.195,0a2.647,2.647,0,0,1-2.709-2.684c-.034-1.59.021-3.186-.093-4.77a13.987,13.987,0,0,0-.6-2.979c-.351-1.171-.831-2.3-1.261-3.45a1.541,1.541,0,0,0-1.682-1.17q-6.961,0-13.922,0a3.567,3.567,0,0,1-3.667-2.89a3.5,3.5,0,0,1-.057-.721q-.006-4.307,0-8.615a3.453,3.453,0,0,1,2.688-3.435,58.885,58.885,0,0,1,8.174-1.349,169.391,169.391,0,0,1,20.954-.683.985.985,0,0,0,.567-.179,12.259,12.259,0,0,1,6.339-2.469a2.172,2.172,0,0,0,.348-.09h1.663a2.887,2.887,0,0,0,.4.1,12.08,12.08,0,0,1,7.839,3.887,2.164,2.164,0,0,0,1.256.711,3.24,3.24,0,0,1,2.175,1.284,12.171,12.171,0,0,1,.8,1.6Zm-51.435-3.328c0,.779,0,1.485,0,2.192,0,1.588.612,2.208,2.185,2.208q6.806,0,13.612,0a3.361,3.361,0,0,1,3.447,2.382q.59,1.548,1.167,3.1a14.026,14.026,0,0,1,.884,4.97q-.008,1.816,0,3.633c0,.618.3.961.905.967q2.623.026,5.247,0c.623-.006.917-.35.92-1.006.007-1.349-.011-2.7.012-4.048a15.558,15.558,0,0,1,.149-1.7a22.565,22.565,0,0,1,1.5-4.886c.44-1.2.79-2.447,2.123-3.053a8.645,8.645,0,0,1-2.565-4.226c-.115-.464-.32-.541-.739-.54q-14.105.015-28.21.008Zm.04-5.333h.592q14.417,0,28.833.01a.741.741,0,0,0,.782-.486,8.871,8.871,0,0,1,15.845.107c.077.147.242.348.37.351,1.052.029,2.1.016,3.147.016a1.913,1.913,0,0,0-1.6-2.456c-.168-.04-.335-.088-.505-.111a2.048,2.048,0,0,1-1.333-.793,10.159,10.159,0,0,0-6.937-3.645a10.58,10.58,0,0,0-7.891,2.368a1.566,1.566,0,0,1-.894.3c-.934.016-1.869-.048-2.8-.059-5.3-.063-10.594.042-15.879.48a67.6,67.6,0,0,0-10.048,1.451C657.919,779.768,657.437,780.434,657.582,781.917Zm31.136,2.648c1.123,0,2.244.009,3.364-.014.117,0,.268-.175.34-.3a2.618,2.618,0,0,1,2.4-1.446c.605-.009,1.211,0,1.817,0a2.617,2.617,0,0,1,2.481,1.483c.062.116.2.269.308.272,1.068.02,2.137.012,3.208.012a7.01,7.01,0,0,0-13.917,0Zm-1.784-.809H657.58v1.684h29.192Zm1.789,2.609a6.859,6.859,0,0,0,6.009,6.059V789.03a2.787,2.787,0,0,1-2.442-2.37.453.453,0,0,0-.326-.282C690.9,786.357,689.827,786.365,688.724,786.365Zm13.895,0c-1.041,0-2.044-.01-3.046.012a.462.462,0,0,0-.343.275,2.77,2.77,0,0,1-2.617,2.4v3.364A6.833,6.833,0,0,0,702.618,786.365Zm-.573,5.28c1.225,0,2.325.017,3.425-.005a1.634,1.634,0,0,0,1.691-1.509c.081-.938.018-1.888.018-2.88-.877,0-1.721-.01-2.564.012a.424.424,0,0,0-.3.258A9.244,9.244,0,0,1,702.046,791.645Zm-6.307-4.4c1.5,0,1.664-.139,1.846-1.578a.851.851,0,0,0-.839-1.062c-.4-.034-.795-.015-1.193-.015-1.626,0-1.849.3-1.455,1.89a.918.918,0,0,0,.914.761C695.253,787.255,695.5,787.241,695.738,787.241Zm11.438-1.772v-1.725h-2.758c.042.492.062.957.132,1.414a.44.44,0,0,0,.3.3C705.605,785.481,706.364,785.469,707.176,785.469Z"></path>
                                                        <path fill="currentColor" id="Path_299" data-name="Path 299" d="M880.673,951.59c.528.028,1.051.015,1.561.092a2.3,2.3,0,0,1,1.872,2.97c-.382,1.2-.823,2.379-1.3,3.54a2.327,2.327,0,0,1-4.277,0c-.483-1.16-.928-2.34-1.314-3.535a2.3,2.3,0,0,1,1.869-2.973C879.606,951.6,880.147,951.618,880.673,951.59Zm0,1.842h-1.139c-.484.03-.738.35-.579.8.375,1.052.76,2.1,1.185,3.135a.791.791,0,0,0,.553.42c.161.013.43-.221.5-.4.418-1.035.8-2.085,1.176-3.138a.557.557,0,0,0-.562-.805C881.428,953.419,881.048,953.432,880.668,953.432Z" transform="translate(-198.284 -159.967)"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        @elseif($subcategory->subcategory_name == 'Body Kit')
                                            <div class="custom-bodykit-logo">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="120" height="72" viewBox="0 0 46.362 18.479">
                                                    <g id="Group_107" data-name="Group 107" transform="translate(-457.523 247.986)">
                                                        <path fill="currentColor" id="Path_287" data-name="Path 287" d="M503.884-239.693v3.876a2.051,2.051,0,0,0-.075.482,4.64,4.64,0,0,1-.675,2.57,14.469,14.469,0,0,0-.656,1.33,2.924,2.924,0,0,1-2.029,1.928h-1.266a1.848,1.848,0,0,1-1.3-2.016c.028-.673-.022-1.351-.06-2.026a2.206,2.206,0,0,0-.151-.74,2.352,2.352,0,0,0-2.6-1.343a2.247,2.247,0,0,0-1.844,2.144c-.029.645-.05,1.292-.033,1.937a1.876,1.876,0,0,1-1.335,2.045H471.97a1.849,1.849,0,0,1-1.311-2.011c.024-.644-.028-1.291-.043-1.936a2.231,2.231,0,0,0-2.261-2.2a2.231,2.231,0,0,0-2.347,2.165c-.024.66-.055,1.322-.036,1.982a1.856,1.856,0,0,1-1.324,2.005H460.94a2.67,2.67,0,0,1-1.57-1.117c-1.079-1.952-2.14-3.912-1.774-6.272a.754.754,0,0,0,0-.09,4.968,4.968,0,0,1,4.052-4.763c2.841-.5,5.692-.938,8.545-1.358a2.576,2.576,0,0,0,1.8-.922,26.227,26.227,0,0,1,1.937-2.076a6.188,6.188,0,0,1,4.5-1.874q6.8-.017,13.6,0a4.972,4.972,0,0,1,3.822,1.734,11.334,11.334,0,0,1,1,1.163,2.1,2.1,0,0,0,1.988.961,4.791,4.791,0,0,1,4.746,3.262C503.712-240.479,503.785-240.082,503.884-239.693Zm-1.7,5.153c0-1.7.038-3.335-.011-4.968a3.023,3.023,0,0,0-2.477-2.884a22.22,22.22,0,0,0-2.427-.119.918.918,0,0,1-.566-.258c-.639-.7-1.266-1.411-1.862-2.146a3.771,3.771,0,0,0-3.113-1.441q-6.486.012-12.972,0a5.038,5.038,0,0,0-3.935,1.682c-.819.9-1.657,1.787-2.5,2.666a1.042,1.042,0,0,1-.523.3c-.68.122-1.37.189-2.053.3-2.6.416-5.2.819-7.787,1.272a3.088,3.088,0,0,0-2.412,1.908a7.306,7.306,0,0,0-.241,3.689c1.69,0,3.33.006,4.97-.013.111,0,.266-.161.322-.283a3.879,3.879,0,0,1,3.719-2.466,3.9,3.9,0,0,1,3.718,2.475.567.567,0,0,0,.416.276q9.469.021,18.939.018c.261,0,.334-.128.46-.316a6.921,6.921,0,0,1,1.181-1.559,3.971,3.971,0,0,1,6.171,1.487c.065.144.2.359.316.363C500.374-234.527,501.23-234.54,502.189-234.54Zm-29.853,3.362h19.157v-1.646H472.336Zm-12.242-1.662c.238.483.43.936.683,1.352a.729.729,0,0,0,.507.315c.986.03,1.974.014,2.984.014v-1.681Zm39.469,0v1.646c.909.144,1.5-.438,1.675-1.646Z" transform="translate(0 0)"></path>
                                                        <path fill="currentColor" id="Path_288" data-name="Path 288" d="M643.9-204.264c-1.085,0-2.169.006-3.254,0a1.605,1.605,0,0,1-1.767-1.758c0-.9.009-1.8,0-2.7a1.715,1.715,0,0,1,.5-1.259q1.055-1.113,2.1-2.237a2.385,2.385,0,0,1,1.81-.777c1.3,0,2.591-.006,3.886,0a1.631,1.631,0,0,1,1.747,1.745q.005,2.636,0,5.272a1.6,1.6,0,0,1-1.719,1.718h-3.3Zm3.376-7.08c-1.392,0-2.743-.012-4.094.014a.954.954,0,0,0-.569.305c-.653.663-1.284,1.348-1.918,2.03a.548.548,0,0,0-.177.3c-.014.924-.008,1.849-.008,2.781h6.765Z" transform="translate(-164.92 -31.814)"></path>
                                                        <path fill="currentColor" id="Path_289" data-name="Path 289" d="M773.743-208.617c0-.885,0-1.771,0-2.656a1.641,1.641,0,0,1,1.733-1.72c1.369-.008,2.739,0,4.109,0a1.718,1.718,0,0,1,1.325.568c.762.83,1.534,1.652,2.282,2.494A1.74,1.74,0,0,1,782.22-207a5.715,5.715,0,0,0-3.51,2.108a1.612,1.612,0,0,1-1.331.638c-.662,0-1.325.011-1.987,0a1.607,1.607,0,0,1-1.65-1.7C773.738-206.846,773.743-207.731,773.743-208.617Zm1.646,2.731c.583,0,1.124.023,1.661-.012a.885.885,0,0,0,.555-.26,7.273,7.273,0,0,1,3.51-2.266c.284-.081.571-.15.9-.236a1.368,1.368,0,0,0-.148-.291c-.675-.748-1.348-1.5-2.043-2.226a.729.729,0,0,0-.478-.167c-1.19-.014-2.38-.009-3.569-.006a3.876,3.876,0,0,0-.387.039Z" transform="translate(-287.574 -31.819)"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        @elseif($subcategory->subcategory_name == 'Part Engine')
                                            <div class="custom-engine-logo">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="120" height="72" viewBox="0 0 39.345 39.343">
                                                    <g id="Group_109" data-name="Group 109" transform="translate(-1219.012 354.61)">
                                                        <path fill="currentColor" id="Path_292" data-name="Path 292" d="M1219.012-323.641c.1-.419.179-.844.3-1.258a7.454,7.454,0,0,1,7.669-5.423,4.815,4.815,0,0,0,4-1.517c2.216-2.273,4.481-4.5,6.728-6.742.1-.1.212-.185.323-.281-.194-.343-.427-.444-.749-.29s-.663.331-1,.486a1.655,1.655,0,0,1-2.037-.342q-.6-.59-1.2-1.195a1.639,1.639,0,0,1-.007-2.455c1.225-1.238,2.46-2.465,3.693-3.694a2.561,2.561,0,0,1,.246-.205,4.8,4.8,0,0,1-.253-1.253,1.86,1.86,0,0,1,.45-.937,15.662,15.662,0,0,1,1.129-1.15,1.539,1.539,0,0,1,2.2-.275l.591-.66c-.488-1-.411-1.445.431-2.288.344-.344.683-.693,1.033-1.031a1.48,1.48,0,0,1,2.107-.039c.236.216.463.443.678.679a.581.581,0,0,1,.013.827.579.579,0,0,1-.826-.009c-.208-.189-.4-.395-.6-.594a.368.368,0,0,0-.6,0c-.4.41-.814.815-1.221,1.223a.367.367,0,0,0,.02.6c.339.331.671.669,1.006,1l11.922,11.922c.421.421.47.42.893,0q.463-.461.924-.923c.4-.4.4-.479.007-.869l-7.088-7.088q-1.643-1.643-3.286-3.286a.59.59,0,0,1-.162-.757.517.517,0,0,1,.614-.28.88.88,0,0,1,.382.233q5.274,5.263,10.537,10.537a1.47,1.47,0,0,1-.011,2.161c-.356.368-.722.726-1.085,1.088a1.6,1.6,0,0,1-2.276.324l-.564.652a5.441,5.441,0,0,1,.255.7,1.369,1.369,0,0,1-.4,1.3c-.38.4-.775.782-1.165,1.171a1.551,1.551,0,0,1-2.222.268c-.093.087-.2.177-.293.274q-1.82,1.818-3.64,3.638a1.669,1.669,0,0,1-2.62.01c-.381-.379-.766-.755-1.139-1.142a1.652,1.652,0,0,1-.329-2.008c.152-.324.31-.645.472-.964a.544.544,0,0,0-.216-.782c-.1.092-.2.181-.3.277q-2.608,2.606-5.214,5.214c-.082.081-.16.167-.247.242a.581.581,0,0,1-.828.012.6.6,0,0,1,.006-.829c.067-.077.143-.147.215-.219q2.62-2.621,5.243-5.24a2.658,2.658,0,0,1,.33-.244l-3.039-3.033c-.207.225-.414.468-.639.694q-3.283,3.289-6.571,6.573a5.474,5.474,0,0,1-4.441,1.672,6.32,6.32,0,0,0-6.8,4.858,6.336,6.336,0,0,0,5.468,7.826,6.385,6.385,0,0,0,7.064-7.023,5.163,5.163,0,0,1,1.176-3.822.572.572,0,0,1,.867-.16.6.6,0,0,1,.039.886,4.264,4.264,0,0,0-.922,3.044,7.457,7.457,0,0,1-1.5,5.3,7.355,7.355,0,0,1-4.958,2.916,1.218,1.218,0,0,0-.214.072h-1.69a1.3,1.3,0,0,0-.211-.074,7.419,7.419,0,0,1-6.153-5.283c-.145-.429-.215-.884-.319-1.327Zm30.549-10.461-11.713-11.7c-1.325,1.322-2.675,2.666-4.018,4.016a.483.483,0,0,0,.025.747c.4.411.813.815,1.219,1.224a.539.539,0,0,0,.7.113c.317-.164.64-.32.964-.471a1.641,1.641,0,0,1,2.037.328q2.425,2.407,4.832,4.832a1.633,1.633,0,0,1,.326,2.006c-.156.336-.318.669-.487,1a.518.518,0,0,0,.105.663c.406.409.808.821,1.223,1.221a.493.493,0,0,0,.8,0C1246.909-331.45,1248.238-332.781,1249.561-334.1Zm3.549-1.7a2.561,2.561,0,0,0-.247-.352q-6.487-6.495-12.978-12.985a.415.415,0,0,0-.687-.006c-.329.34-.669.67-1,1.005-.425.425-.426.506,0,.928l9.071,9.071q1.887,1.888,3.776,3.774c.3.3.44.3.737.008.365-.359.728-.72,1.084-1.088A2.926,2.926,0,0,0,1253.111-335.8Zm-11.671-13.556,11.64,11.646.549-.514-11.666-11.665Z" transform="translate(0 0)"></path>
                                                        <path fill="currentColor" id="Path_293" data-name="Path 293" d="M1275.371,13.065a3.783,3.783,0,1,1-3.785-3.787A3.77,3.77,0,0,1,1275.371,13.065Zm-3.776-2.606a2.6,2.6,0,0,0-2.634,2.583,2.619,2.619,0,1,0,5.239.061A2.586,2.586,0,0,0,1271.595,10.459Z" transform="translate(-45.037 -335.88)"></path>
                                                        <path fill="currentColor" id="Path_294" data-name="Path 294" d="M1485.441-187.171a.6.6,0,0,1-.847.616,1.537,1.537,0,0,1-.322-.267q-2.726-2.723-5.449-5.449a1.754,1.754,0,0,1-.229-.256.534.534,0,0,1,.075-.731.532.532,0,0,1,.7-.082,1.625,1.625,0,0,1,.287.252q2.726,2.723,5.447,5.451A3.146,3.146,0,0,1,1485.441-187.171Z" transform="translate(-239.499 -148.768)"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        @elseif($subcategory->subcategory_name == 'Tires')
                                            <div class="custom-tire-logo">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="120" height="72" viewBox="0 0 29.696 40.512">
                                                    <g id="Group_108" data-name="Group 108" transform="translate(-895.88 -107.369)">
                                                        <path id="Path_290" data-name="Path 290" d="M904.159,107.369h15.174a4.838,4.838,0,0,1,2.821,2.472,17.8,17.8,0,0,1,1.115,2.342,40.383,40.383,0,0,1,2.144,11.219c.058.771.109,1.543.163,2.315v3.8a3.427,3.427,0,0,0-.069.384c-.086,1.234-.147,2.471-.253,3.7a40.859,40.859,0,0,1-1.117,6.684,17.4,17.4,0,0,1-2.309,5.625,4,4,0,0,1-3.576,1.971c-4.411-.064-8.823-.038-13.234-.011a4.1,4.1,0,0,1-2.826-1.1,12.459,12.459,0,0,1-2.8-3.737,32.814,32.814,0,0,1-3.446-13.419,36.229,36.229,0,0,1,.638-9.155,27.442,27.442,0,0,1,3.481-9.412A7.617,7.617,0,0,1,904.159,107.369Zm12.064,1.367c-.125-.01-.187-.019-.25-.019-3.714,0-7.428-.015-11.141.018a2.78,2.78,0,0,0-1.32.428,7.029,7.029,0,0,0-2.157,2.327c-.4.608-.736,1.255-1.142,1.954.925,0,1.739.011,2.552-.008a1.209,1.209,0,0,0,.581-.176c.534-.331,1.05-.692,1.6-1.062l.756,1.134c-.7.465-1.349.912-2.018,1.33a1.127,1.127,0,0,1-.562.13c-1,.012-2,.023-3,0-.367-.009-.578.076-.676.454-.092.354-.263.687-.378,1.036-.2.6-.381,1.213-.585,1.868,1.1,0,2.126.005,3.151-.007a.745.745,0,0,0,.351-.151c.537-.346,1.068-.7,1.619-1.064l.747,1.13c-.633.423-1.22.846-1.839,1.216a1.812,1.812,0,0,1-.844.25c-1.066.029-2.133.006-3.2.019-.127,0-.348.092-.364.174-.211,1.037-.392,2.08-.589,3.164.905,0,1.733.013,2.561-.009a1.3,1.3,0,0,0,.614-.192c.523-.32,1.027-.673,1.563-1.029l.753,1.131c-.583.39-1.149.747-1.691,1.137a1.735,1.735,0,0,1-1.1.338c-.829-.018-1.66,0-2.489-.011-.275-.005-.372.087-.37.36,0,.3-.051.6-.055.906-.009.693,0,1.386,0,2.106.9,0,1.812.014,2.718-.01a1.472,1.472,0,0,0,.685-.214c.524-.315,1.025-.668,1.556-1.02l.753,1.131c-.7.468-1.367.92-2.044,1.348a.977.977,0,0,1-.49.105c-.817.01-1.633,0-2.45,0h-.781l.276,3.373h.455c.909,0,1.818.013,2.726-.009a1.393,1.393,0,0,0,.653-.2c.534-.321,1.047-.679,1.578-1.029l.75,1.132c-.692.46-1.343.907-2.011,1.325a1.135,1.135,0,0,1-.56.137c-.816.014-1.633.006-2.45.006h-.947l.743,3.347h.538c1.027,0,2.055.011,3.082-.009a1.375,1.375,0,0,0,.654-.2c.523-.317,1.024-.671,1.548-1.02l.75,1.132c-.5.334-.989.621-1.432.968a2.473,2.473,0,0,1-1.723.521c-.971-.04-1.944-.01-2.93-.01a.774.774,0,0,0,.014.193c.394.988.784,1.978,1.2,2.958a.469.469,0,0,0,.363.187c.974.015,1.949.019,2.923,0a1.286,1.286,0,0,0,.615-.189c.524-.321,1.029-.677,1.567-1.036l.752,1.129a7.222,7.222,0,0,0-.759.52,3.859,3.859,0,0,1-3.167.958,13.2,13.2,0,0,0-1.473-.009,9.308,9.308,0,0,0,2.527,2.945,2.36,2.36,0,0,0,1.37.428q5.512,0,11.024,0a3.185,3.185,0,0,0,.326-.037,10.906,10.906,0,0,1-1.725-3.058.4.4,0,0,0-.446-.28c-1.027.01-2.055.008-3.082,0a1.1,1.1,0,0,1-.538-.077c-.713-.44-1.406-.912-2.121-1.382l.756-1.135c.56.373,1.083.724,1.609,1.07a.685.685,0,0,0,.311.154c.957.012,1.914.007,2.887.007l-.84-3.345H912.6c-.988,0-1.976,0-2.963,0a1.166,1.166,0,0,1-.574-.1c-.7-.433-1.385-.9-2.1-1.373l.757-1.133a6.737,6.737,0,0,1,.7.469,3.13,3.13,0,0,0,2.506.767c.608-.062,1.228-.012,1.868-.012l-.442-3.347c-1.153,0-2.284,0-3.415,0a1.011,1.011,0,0,1-.5-.073c-.721-.445-1.426-.917-2.151-1.389l.761-1.138c.4.266.791.489,1.138.768a2.227,2.227,0,0,0,1.605.486c.8-.043,1.6-.011,2.443-.011-.058-1.145-.115-2.243-.172-3.377h-.417c-.935,0-1.87,0-2.805,0a.976.976,0,0,1-.491-.1c-.689-.435-1.362-.894-2.057-1.355.212-.319.408-.614.606-.908.044-.064.1-.122.153-.193a1.214,1.214,0,0,1,.245.137,4.341,4.341,0,0,0,3.67,1.084,9.741,9.741,0,0,1,1.132-.007v-3.367h-.422c-.909,0-1.818.005-2.726,0a1.165,1.165,0,0,1-.573-.1c-.7-.434-1.385-.9-2.088-1.363l.756-1.134a5.128,5.128,0,0,1,.579.388,3.431,3.431,0,0,0,2.794.853,17.069,17.069,0,0,1,1.812-.012l.356-3.345h-.442c-.843,0-1.686,0-2.529,0a1.019,1.019,0,0,1-.5-.076c-.722-.446-1.428-.918-2.156-1.393l.814-1.213c1.122,1.323,2.583,1.413,4.122,1.314.9-.058.9-.011,1.089-.9l.512-2.464h-.453c-.948,0-1.9.006-2.845-.006a1.049,1.049,0,0,1-.525-.12c-.679-.427-1.341-.88-2.035-1.341l.757-1.132c.55.365,1.057.719,1.583,1.041a1.291,1.291,0,0,0,.614.194c.974.02,1.949,0,2.923.017a.459.459,0,0,0,.527-.381A13.575,13.575,0,0,1,916.223,108.736Zm8.055,18.259c-.169-2.151-.3-4.306-.516-6.452a31.72,31.72,0,0,0-1.655-7.57,10.935,10.935,0,0,0-1.754-3.335c-.78-.949-1.617-1.159-2.462-.571a3.519,3.519,0,0,0-.681.653,10.371,10.371,0,0,0-1.689,3.234,41.124,41.124,0,0,0-2.033,11.934,56.969,56.969,0,0,0,.544,11.189,29.294,29.294,0,0,0,1.9,7.224,7.243,7.243,0,0,0,1.776,2.719,1.482,1.482,0,0,0,2.19.006,5.819,5.819,0,0,0,.942-1.105,16.234,16.234,0,0,0,1.977-4.959A55.53,55.53,0,0,0,924.279,126.995Z" fill="currentColor"></path>
                                                        <path id="Path_291" data-name="Path 291" d="M1055.392,199.562a23.763,23.763,0,0,1,.967-6.942,5.533,5.533,0,0,1,1.094-2.078,1.61,1.61,0,0,1,2.6-.01,6.469,6.469,0,0,1,1.346,2.9,29,29,0,0,1,.585,9.607,16.9,16.9,0,0,1-1.059,4.952,5.752,5.752,0,0,1-.911,1.506,1.574,1.574,0,0,1-2.532-.007,6.669,6.669,0,0,1-1.353-2.9A27.679,27.679,0,0,1,1055.392,199.562Zm1.344.853c.04.645.074,1.7.177,2.746a13.592,13.592,0,0,0,1.184,4.831,4.041,4.041,0,0,0,.673.772,4.253,4.253,0,0,0,.645-.759,12.714,12.714,0,0,0,1.125-4.243,30.271,30.271,0,0,0,.165-5.793,19.683,19.683,0,0,0-.736-4.542,9.769,9.769,0,0,0-.831-1.858c-.25-.45-.519-.458-.752-.012a11.729,11.729,0,0,0-.913,2.161A25.35,25.35,0,0,0,1056.736,200.415Z" transform="translate(-139.947 -72.391)" fill="currentColor"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        @elseif($subcategory->subcategory_name == 'Oil')
                                            <div class="custom-oil-logo">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="120" height="72" viewBox="0 0 27.656 39.343">
                                                    <g id="Group_110" data-name="Group 110" transform="translate(-1582.203 -131.514)">
                                                        <path fill="currentColor" id="Path_295" data-name="Path 295" d="M1582.2,163.326V142.117c.166-.221.317-.456.5-.662,1.3-1.467,2.6-2.925,3.9-4.4a.9.9,0,0,0,.206-.538c.018-1.267.006-2.535.01-3.8a1.132,1.132,0,0,1,1.2-1.2q3.4,0,6.8,0a1.138,1.138,0,0,1,1.214,1.229c0,1,0,2,0,3v.384c1.143,0,2.23.011,3.316-.006a1.372,1.372,0,0,1,1.087.463q4.481,4.774,8.972,9.539a1.6,1.6,0,0,1,.455,1.173c-.01,4.9-.018,9.809,0,14.713a4.163,4.163,0,0,1-.877,3.074c.092.124.162.215.228.308a3.468,3.468,0,0,1-1.918,5.356c-.121.033-.24.074-.36.112h-21.811a4.046,4.046,0,0,1-2.053-1.163,4.454,4.454,0,0,1-.865-1.757v-1.076l.74-1.768Zm2.3-3.865c.4-.046.765-.116,1.131-.123a1.121,1.121,0,0,1,1.173,1.11,1.139,1.139,0,0,1-1.1,1.186,1.155,1.155,0,1,0,0,2.308,1.152,1.152,0,0,1,.013,2.3,1.159,1.159,0,1,0,.091,2.308q10.211,0,20.422,0a1.16,1.16,0,1,0,.089-2.308,1.153,1.153,0,0,1,.012-2.3,1.156,1.156,0,1,0,0-2.309,1.143,1.143,0,0,1-1.087-1.2,1.119,1.119,0,0,1,1.151-1.093c.376.007.75.077,1.137.12.005-.062.015-.125.015-.188q0-5.742-.008-11.484a.75.75,0,0,0-.2-.459q-4.067-4.345-8.156-8.669a.8.8,0,0,0-.52-.221q-4.933-.019-9.865,0a.73.73,0,0,0-.485.211q-1.8,1.993-3.57,4.018a1,1,0,0,0-.226.605q-.018,7.912-.01,15.824Zm4.626-23.358h4.567v-2.258h-4.567Z"></path>
                                                        <path fill="currentColor" id="Path_296" data-name="Path 296" d="M1731.8,263.625a3.5,3.5,0,0,1-2.751-1.044c-1.806-1.9-3.612-3.8-5.388-5.733a3.45,3.45,0,0,1,4.987-4.763c1.862,1.918,3.7,3.86,5.493,5.844a3.2,3.2,0,0,1,.517,3.686A3.241,3.241,0,0,1,1731.8,263.625Zm-.436-2.295a1.232,1.232,0,0,0,1.2-.686,1.088,1.088,0,0,0-.22-1.274q-2.622-2.8-5.256-5.59a1.141,1.141,0,1,0-1.661,1.565q2.617,2.806,5.261,5.585A2.476,2.476,0,0,0,1731.36,261.331Z" transform="translate(-129.735 -110.354)"></path>
                                                        <path fill="currentColor" id="Path_297" data-name="Path 297" d="M1720.406,441.794a3.407,3.407,0,0,1-3.259-4.48,17.352,17.352,0,0,1,2.378-4.313,1.079,1.079,0,0,1,1.709-.07,14.425,14.425,0,0,1,2.539,4.732A3.394,3.394,0,0,1,1720.406,441.794Zm.1-5.872h-.184c-.344.759-.711,1.509-1.023,2.282a1.008,1.008,0,0,0,.483,1.083,1.1,1.1,0,0,0,1.259,0,1.011,1.011,0,0,0,.485-1.082C1721.217,437.433,1720.851,436.682,1720.508,435.923Z" transform="translate(-124.388 -277.855)"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        @elseif($subcategory->subcategory_name == 'Part Lawas')
                                            <div class="custom-vintage-logo">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="120" height="72" viewBox="0 0 35.5 40.2">
                                                    <g id="Group_112" data-name="Group 112" transform="translate(-1200 -150)">
                                                        <path fill="currentColor" id="Path_300" data-name="Path 300" d="M1217.8,150c2.1,0,4.2-.1,6.3,0a8.2,8.2,0,0,1,7.8,6.2,15.8,15.8,0,0,1,.6,4.1c.1,3.2,0,6.4,0,9.6a16.2,16.2,0,0,1-.8,5.1,8.1,8.1,0,0,1-7.6,5.8c-4.2.2-8.4.1-12.6,0a8.1,8.1,0,0,1-7.8-6.4,17.2,17.2,0,0,1-.7-4.8c0-3.1,0-6.2,0-9.3a17.8,17.8,0,0,1,.6-4.6,8.2,8.2,0,0,1,7.9-5.7C1213.6,149.9,1215.7,150,1217.8,150Zm0,2.1c-1.8,0-3.6-.1-5.4,0a6.1,6.1,0,0,0-5.8,4.2,13.2,13.2,0,0,0-.6,3.8c0,3.4,0,6.8,0,10.2a14.8,14.8,0,0,0,.5,3.6,6.1,6.1,0,0,0,5.9,4.4c3.6.1,7.2.1,10.8,0a6.1,6.1,0,0,0,5.9-4.4,14.8,14.8,0,0,0,.5-3.6c0-3.4,0-6.8,0-10.2a13.2,13.2,0,0,0-.6-3.8,6.1,6.1,0,0,0-5.8-4.2C1221.4,152,1219.6,152.1,1217.8,152.1Z"></path>
                                                        <path fill="currentColor" id="Path_301" data-name="Path 301" d="M1217.8,155.2c1.2,0,2.4,0,3.6,0a3.1,3.1,0,0,1,3.1,3.1c0,2.4,0,4.8,0,7.2a3.1,3.1,0,0,1-3.1,3.1c-2.4,0-4.8,0-7.2,0a3.1,3.1,0,0,1-3.1-3.1c0-2.4,0-4.8,0-7.2a3.1,3.1,0,0,1,3.1-3.1C1215.4,155.2,1216.6,155.2,1217.8,155.2Zm0,1.8c-1,0-2,0-3,0a1.3,1.3,0,0,0-1.3,1.3c0,2,0,4,0,6a1.3,1.3,0,0,0,1.3,1.3c2,0,4,0,6,0a1.3,1.3,0,0,0,1.3-1.3c0-2,0-4,0-6a1.3,1.3,0,0,0-1.3-1.3C1219.8,157,1218.8,157,1217.8,157Z"></path>
                                                        <path fill="currentColor" id="Path_302" data-name="Path 302" d="M1205.5,158.5h2.8v1.8h-2.8v-1.8Z"></path>
                                                        <path fill="currentColor" id="Path_303" data-name="Path 303" d="M1227.2,158.5h2.8v1.8h-2.8v-1.8Z"></path>
                                                        <path fill="currentColor" id="Path_304" data-name="Path 304" d="M1205.5,163.8h2.8v1.8h-2.8v-1.8Z"></path>
                                                        <path fill="currentColor" id="Path_305" data-name="Path 305" d="M1227.2,163.8h2.8v1.8h-2.8v-1.8Z"></path>
                                                        <path fill="currentColor" id="Path_306" data-name="Path 306" d="M1217.8,159.2c.6,0,1.2,0,1.8,0a.9.9,0,0,1,.9.9c0,1.2,0,2.4,0,3.6a.9.9,0,0,1-.9.9c-1.2,0-2.4,0-3.6,0a.9.9,0,0,1-.9-.9c0-1.2,0-2.4,0-3.6a.9.9,0,0,1,.9-.9C1216.6,159.2,1217.2,159.2,1217.8,159.2Z"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="custom-default-logo">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 60" width="120" height="72">
                                                    <path style="fill:currentColor;stroke-width:2" d="M 25,15 L 75,15 C 80,15 85,20 85,25 L 85,45 C 85,50 80,55 75,55 L 25,55 C 20,55 15,50 15,45 L 15,25 C 15,20 20,15 25,15 Z M 30,22 L 70,22 L 70,26 L 30,26 Z M 30,30 L 70,30 L 70,34 L 30,34 Z M 30,38 L 70,38 L 70,42 L 30,42 Z"/>
                                                </svg>
                                            </div>
                                        @endif
                                        <h4>{{ $subcategory->subcategory_name }}</h4>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- ============================================== SPAREPART FILTER SECTION : END ============================================== -->

                <!-- ============================================== SPAREPART PRODUCTS ============================================== -->
                <div class="sparepart-products-section">
                    <div class="container-fluid">
                        <div class="row" id="sparepart-products-container">
                            @forelse($sparepartProducts as $product)
                            <div class="col-md-4 col-sm-6 sparepart-product-item" data-category="{{ $product->subcategory_id }}">
                                <div class="sparepart-product-card">
                                    <div class="product-image">
                                        <img src="{{ asset($product->product_thambnail) }}" alt="{{ $product->product_name }}" class="img-responsive">
                                        <div class="wishlist-btn">
                                            <button type="button" id="{{ $product->id }}" onclick="addToWishList(this.id)">
                                                <i class="fa fa-heart-o"></i>
                                            </button>
                                        </div>
                                        @php
                                        if($product->product_discount && $product->product_discount > 0) {
                                            $amount = $product->product_price - $product->product_discount;
                                            $discount = ($amount/$product->product_price) * 100;
                                        }
                                        @endphp
                                        @if($product->product_discount && $product->product_discount > 0)
                                        <div class="discount-badge">
                                            <span>{{ round($discount) }}%</span>
                                        </div>
                                        @elseif($product->hot_deals)
                                        <div class="hot-badge">
                                            <span>Hot</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-name">{{ $product->product_name }}</h3>
                                        @if($product->product_code)
                                        <div class="part-number">
                                            <small><strong>Kode:</strong> {{ $product->product_code }}</small>
                                        </div>
                                        @endif
                                        <div class="product-price">
                                            @if($product->product_discount && $product->product_discount > 0)
                                                <span class="price">Rp {{ number_format($product->product_discount, 0, '', '.') }}</span>
                                                <span class="old-price">Rp {{ number_format($product->product_price, 0, '', '.') }}</span>
                                            @elseif($product->product_price && $product->product_price > 0)
                                                <span class="price">Rp {{ number_format($product->product_price, 0, '', '.') }}</span>
                                            @else
                                                <span class="price">Hubungi Kami</span>
                                            @endif
                                        </div>
                                        @if($product->product_qty > 0)
                                        <div class="warranty-info">
                                            <small><i class="fa fa-check-circle"></i> Stok: {{ $product->product_qty }}</small>
                                        </div>
                                        @else
                                        <div class="warranty-info" style="color: #dc3545;">
                                            <small><i class="fa fa-times-circle"></i> Stok Habis</small>
                                        </div>
                                        @endif
                                        <div class="product-actions">
                                            <button class="btn btn-primary btn-sm add-to-cart" type="button" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)">
                                                <i class="fa fa-shopping-cart"></i> Tambah ke Keranjang
                                            </button>
                                            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}" class="btn btn-outline-primary btn-sm">
                                                <i class="fa fa-eye"></i> Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-md-12">
                                <div class="no-products-message">
                                    <div class="alert alert-info text-center">
                                        <i class="fa fa-info-circle"></i> Tidak ada sparepart untuk kategori yang dipilih.
                                    </div>
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- ============================================== SPAREPART PRODUCTS : END ============================================== -->
            </div>
        </div>
    </div>
</div>

<style>
/* Sparepart Filter Section */
.sparepart-filter-section {
    padding: 40px 0;
    background: #f8f9fa;
    margin-bottom: 30px;
}


.sparepart-category-icon {
    text-align: center;
    padding: 25px 15px;
    background: white;
    border-radius: 10px;
    margin: 10px 5px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 180px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.sparepart-category-icon:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.sparepart-category-icon.active {
    background: #dc3545;
    color: white;
}

.sparepart-category-icon.active i {
    color: white !important;
}

.sparepart-category-icon.active h4 {
    color: white !important;
}

.category-content {
    text-decoration: none;
    color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.sparepart-category-icon i {
    color: #dc3545;
    margin-bottom: 10px;
}

/* Custom SVG Logo Styles - matching vehicle page */
.custom-interior-logo,
.custom-bodykit-logo,
.custom-engine-logo,
.custom-tire-logo,
.custom-oil-logo,
.custom-vintage-logo,
.custom-default-logo {
    margin-bottom: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.custom-interior-logo svg,
.custom-bodykit-logo svg,
.custom-engine-logo svg,
.custom-tire-logo svg,
.custom-oil-logo svg,
.custom-vintage-logo svg,
.custom-default-logo svg {
    color: #dc3545;
    transition: all 0.3s ease;
    display: block;
    margin: 0 auto;
}

.sparepart-category-icon.active .custom-interior-logo svg,
.sparepart-category-icon.active .custom-bodykit-logo svg,
.sparepart-category-icon.active .custom-engine-logo svg,
.sparepart-category-icon.active .custom-tire-logo svg,
.sparepart-category-icon.active .custom-oil-logo svg,
.sparepart-category-icon.active .custom-vintage-logo svg,
.sparepart-category-icon.active .custom-default-logo svg {
    color: white !important;
}

.sparepart-category-icon h4 {
    font-size: 1.5rem;
    font-weight: bold;
    margin: 0;
    line-height: 1.2;
}

/* Sparepart Products Section */
.sparepart-products-section {
    padding: 30px 0;
}

.sparepart-product-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    margin-bottom: 30px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.sparepart-product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 25px rgba(0,0,0,0.15);
}

.product-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.sparepart-product-card:hover .product-image img {
    transform: scale(1.05);
}

.wishlist-btn {
    position: absolute;
    top: 10px;
    right: 10px;
}

.wishlist-btn button {
    background: rgba(255,255,255,0.9);
    border: none;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #666;
    transition: all 0.3s ease;
}

.wishlist-btn button:hover {
    background: #dc3545;
    color: white;
}

.discount-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: #dc3545;
    color: white;
    padding: 6px 10px;
    border-radius: 100%;
    font-size: 1.2rem;
    font-weight: bold;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hot-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: #ff6b35;
    color: white;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: bold;
}

.product-info {
    padding: 20px;
}

.part-number {
    margin-bottom: 10px;
    color: #666;
    font-size: 1.2rem;
}

.warranty-info {
    margin-top: 10px;
    color: #28a745;
    font-weight: bold;
    font-size: 1.5rem;
}

.no-products-message {
    margin: 50px 0;
}

.product-name {
    font-size: 2rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
    line-height: 1.3;
    height: 55px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.product-price {
    margin-bottom: 15px;
}

.product-price .price {
    font-size: 2rem;
    font-weight: bold;
    color: #dc3545;
}

.product-price .old-price {
    font-size: 1.5rem;
    color: #999;
    text-decoration: line-through;
    margin-left: 10px;
}

.product-actions {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.product-actions .btn {
    padding: 12px 20px;
    border-radius: 5px;
    font-size: 1.5rem;
    text-align: center;
    text-decoration: none;
    border: none;
    transition: all 0.3s ease;
}

.add-to-cart {
    background: #dc3545;
    color: white;
}

.add-to-cart:hover {
    background: #c82333;
    color: white;
}

.btn-outline-primary {
    background: transparent;
    border: 1px solid #dc3545;
    color: #dc3545;
}

.btn-outline-primary:hover {
    background: #dc3545;
    color: white;
    text-decoration: none;
}

/* Responsive Design */
@media (max-width: 768px) {
    .sparepart-category-icon {
        margin: 5px;
        padding: 20px 10px;
        height: 160px;
    }
    
    .sparepart-category-icon h4 {
        font-size: 1.0rem;
    }
    
    .custom-interior-logo svg,
    .custom-bodykit-logo svg,
    .custom-engine-logo svg,
    .custom-tire-logo svg,
    .custom-oil-logo svg,
    .custom-vintage-logo svg,
    .custom-default-logo svg {
        width: 90px;
        height: 54px;
    }
    
    .product-name {
        font-size: 1.3rem;
        height: 45px;
    }
    
    .product-info {
        padding: 15px;
    }
}

@media (max-width: 480px) {
    .sparepart-categories-header .col-xs-6 {
        width: 50%;
        float: left;
    }
    
    .sparepart-category-icon {
        height: 140px;
        padding: 15px 8px;
    }
    
    .sparepart-category-icon h4 {
        font-size: 0.9rem;
    }
    
    .custom-interior-logo svg,
    .custom-bodykit-logo svg,
    .custom-engine-logo svg,
    .custom-tire-logo svg,
    .custom-oil-logo svg,
    .custom-vintage-logo svg,
    .custom-default-logo svg {
        width: 80px;
        height: 48px;
    }
    
    .sparepart-product-card {
        margin-bottom: 20px;
    }
    
    .product-actions .btn {
        padding: 8px 12px;
        font-size: 0.85rem;
    }
}

/* Fix for Bootstrap col-xs-6 */
@media (max-width: 767px) {
    .col-xs-6 {
        width: 50%;
        float: left;
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all filter elements
    const categoryFilters = document.querySelectorAll('.category-filter');
    const sparepartItems = document.querySelectorAll('.sparepart-product-item');
    const noProductsMessage = document.querySelector('.no-products-message');
    
    // Track current active category
    let currentActiveCategory = null;

    // Show all spareparts function
    function showAllSpareparts() {
        // Remove active class from all category filters
        categoryFilters.forEach(filter => filter.classList.remove('active'));
        
        // Show all sparepart items
        sparepartItems.forEach(item => {
            item.style.display = 'block';
        });
        
        // Hide no products message
        if (noProductsMessage) {
            noProductsMessage.style.display = 'none';
        }
        
        // Reset current active category
        currentActiveCategory = null;
    }

    // Filter by category function
    function filterByCategory(categoryId) {
        // Remove active class from all category filters
        categoryFilters.forEach(filter => filter.classList.remove('active'));
        
        // Add active class to clicked category
        const clickedFilter = document.querySelector(`[data-category="${categoryId}"]`);
        if (clickedFilter) {
            clickedFilter.classList.add('active');
        }
        
        // Filter sparepart items
        let visibleCount = 0;
        sparepartItems.forEach(item => {
            const itemCategory = item.getAttribute('data-category');
            if (itemCategory === categoryId) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });
        
        // Show/hide no products message
        if (noProductsMessage) {
            if (visibleCount === 0) {
                noProductsMessage.style.display = 'block';
            } else {
                noProductsMessage.style.display = 'none';
            }
        }
        
        // Update current active category
        currentActiveCategory = categoryId;
    }

    // Event listeners with toggle functionality
    categoryFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            const categoryId = this.getAttribute('data-category');
            
            // Toggle functionality: if clicking the same category, show all
            if (currentActiveCategory === categoryId) {
                showAllSpareparts();
            } else {
                filterByCategory(categoryId);
            }
        });
    });
    
    // Initialize - show all spareparts by default
    showAllSpareparts();
});
</script>

@endsection

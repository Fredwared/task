<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var baseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-4.2.2.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-4.2.2.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-appointment">
                                <a href="#endpoints-GETapi-appointment">Booking Estimate
Оценка бронирования</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appointment--user_uuid-">
                                <a href="#endpoints-POSTapi-appointment--user_uuid-">Booking appointment
Бронирование встречи</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PATCHapi-appointment--appointment_uuid-">
                                <a href="#endpoints-PATCHapi-appointment--appointment_uuid-">Change status
Смена статуса</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: November 13, 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-appointment">Booking Estimate
Оценка бронирования</h2>

<p>
</p>



<span id="example-requests-GETapi-appointment">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appointment?specialist_role=vero&amp;booking_date=ea" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"specialist_role\": \"1\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appointment"
);

const params = {
    "specialist_role": "vero",
    "booking_date": "ea",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "specialist_role": "1"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appointment">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;uuid&quot;: &quot;aee58d95-a7e5-321a-addb-55bf9618bed5&quot;,
            &quot;name&quot;: &quot;Ms. Bessie Ryan&quot;,
            &quot;hours&quot;: [
                &quot;10:54&quot;,
                &quot;21:05&quot;
            ],
            &quot;is_available&quot;: true
        },
        {
            &quot;uuid&quot;: &quot;01d126e5-a818-3c28-a48d-94692d8a845c&quot;,
            &quot;name&quot;: &quot;Odessa Will&quot;,
            &quot;hours&quot;: [
                &quot;17:15&quot;,
                &quot;22:41&quot;
            ],
            &quot;is_available&quot;: true
        },
        {
            &quot;uuid&quot;: &quot;6dcfb5a8-eea7-3cc4-b039-5e4672546148&quot;,
            &quot;name&quot;: &quot;Sincere Carroll PhD&quot;,
            &quot;hours&quot;: [
                &quot;02:51&quot;,
                &quot;07:33&quot;,
                &quot;08:45&quot;
            ],
            &quot;is_available&quot;: true
        },
        {
            &quot;uuid&quot;: &quot;82f063e5-4581-330a-8791-b4295876aaca&quot;,
            &quot;name&quot;: &quot;Missouri Gaylord III&quot;,
            &quot;hours&quot;: [
                &quot;02:51&quot;,
                &quot;03:30&quot;,
                &quot;12:10&quot;
            ],
            &quot;is_available&quot;: true
        },
        {
            &quot;uuid&quot;: &quot;6d221ffe-3854-32ec-a200-8c9430f307f7&quot;,
            &quot;name&quot;: &quot;Abby Abbott&quot;,
            &quot;hours&quot;: [
                &quot;01:05&quot;,
                &quot;02:03&quot;,
                &quot;02:16&quot;,
                &quot;10:54&quot;
            ],
            &quot;is_available&quot;: true
        },
        {
            &quot;uuid&quot;: &quot;9a296e83-62f9-310b-a880-50b6dbb81973&quot;,
            &quot;name&quot;: &quot;Prof. Colten Schneider PhD&quot;,
            &quot;hours&quot;: [
                &quot;00:48&quot;,
                &quot;03:12&quot;,
                &quot;10:27&quot;,
                &quot;10:48&quot;,
                &quot;14:02&quot;
            ],
            &quot;is_available&quot;: true
        },
        {
            &quot;uuid&quot;: &quot;e960b127-fce4-3715-91fc-742d43b38b9b&quot;,
            &quot;name&quot;: &quot;Alysha Kuhic&quot;,
            &quot;hours&quot;: [
                &quot;09:11&quot;,
                &quot;21:11&quot;
            ],
            &quot;is_available&quot;: true
        },
        {
            &quot;uuid&quot;: &quot;c9352965-a1a9-3654-8735-da532026b81c&quot;,
            &quot;name&quot;: &quot;Carolyne Maggio&quot;,
            &quot;hours&quot;: [
                &quot;01:28&quot;,
                &quot;02:38&quot;,
                &quot;11:02&quot;
            ],
            &quot;is_available&quot;: true
        },
        {
            &quot;uuid&quot;: &quot;4366d668-74a7-3de3-bd3d-3ce31ea2d315&quot;,
            &quot;name&quot;: &quot;Evie Beier&quot;,
            &quot;hours&quot;: [
                &quot;03:48&quot;,
                &quot;09:47&quot;,
                &quot;16:24&quot;,
                &quot;20:08&quot;
            ],
            &quot;is_available&quot;: true
        },
        {
            &quot;uuid&quot;: &quot;ee3815a4-b14f-3fb4-8f43-f17de1c5e4a3&quot;,
            &quot;name&quot;: &quot;Ms. Nikki Romaguera&quot;,
            &quot;hours&quot;: [
                &quot;00:28&quot;,
                &quot;03:38&quot;,
                &quot;06:26&quot;,
                &quot;07:36&quot;,
                &quot;10:00&quot;,
                &quot;17:29&quot;
            ],
            &quot;is_available&quot;: true
        },
        {
            &quot;uuid&quot;: &quot;3427e25d-e187-387d-b174-98df53c018ca&quot;,
            &quot;name&quot;: &quot;Dr. Jason Heaney PhD&quot;,
            &quot;hours&quot;: [
                &quot;05:51&quot;,
                &quot;06:11&quot;,
                &quot;12:58&quot;,
                &quot;17:41&quot;
            ],
            &quot;is_available&quot;: true
        },
        {
            &quot;uuid&quot;: &quot;cfb91586-df7d-32d4-aeb6-fd93ff0cf638&quot;,
            &quot;name&quot;: &quot;Dr. Colby Ritchie I&quot;,
            &quot;hours&quot;: [
                &quot;00:03&quot;,
                &quot;07:52&quot;,
                &quot;12:25&quot;,
                &quot;18:19&quot;
            ],
            &quot;is_available&quot;: true
        },
        {
            &quot;uuid&quot;: &quot;ffe11ae2-b5a1-3584-9f0b-6309b7ec3259&quot;,
            &quot;name&quot;: &quot;Michaela Gutkowski&quot;,
            &quot;hours&quot;: [
                &quot;11:30&quot;,
                &quot;11:31&quot;,
                &quot;18:17&quot;,
                &quot;21:38&quot;
            ],
            &quot;is_available&quot;: true
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appointment" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appointment"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appointment"></code></pre>
</span>
<span id="execution-error-GETapi-appointment" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appointment"></code></pre>
</span>
<form id="form-GETapi-appointment" data-method="GET"
      data-path="api/appointment"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appointment', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appointment"
                    onclick="tryItOut('GETapi-appointment');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appointment"
                    onclick="cancelTryOut('GETapi-appointment');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appointment" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appointment</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>specialist_role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="specialist_role"
               data-endpoint="GETapi-appointment"
               value="vero"
               data-component="query" hidden>
    <br>
<p>Специалист врач</p>
            </p>
                    <p>
                <b><code>booking_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="booking_date"
               data-endpoint="GETapi-appointment"
               value="ea"
               data-component="query" hidden>
    <br>
<p>Время бронирование</p>
            </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>specialist_role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="specialist_role"
               data-endpoint="GETapi-appointment"
               value="1"
               data-component="body" hidden>
    <br>
<p>Must be one of <code>1</code>, <code>2</code>, <code>3</code>, <code>4</code>, <code>5</code>, or <code>6</code>.</p>
        </p>
        </form>

                    <h2 id="endpoints-POSTapi-appointment--user_uuid-">Booking appointment
Бронирование встречи</h2>

<p>
</p>



<span id="example-requests-POSTapi-appointment--user_uuid-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appointment/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"passport\": \"aliquam\",
    \"booking_date\": \"ipsa\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appointment/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "passport": "aliquam",
    "booking_date": "ipsa"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appointment--user_uuid-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;uuid&quot;: &quot;453f9a5d-b2a5-4ac7-996f-cddc4f3b5539&quot;,
        &quot;doctor&quot;: {
            &quot;uuid&quot;: &quot;aee58d95-a7e5-321a-addb-55bf9618bed5&quot;,
            &quot;name&quot;: &quot;Ms. Bessie Ryan&quot;
        },
        &quot;patient&quot;: {
            &quot;uuid&quot;: &quot;cf000f75-cb5d-4fc9-a804-9bed3d25395e&quot;,
            &quot;first_name&quot;: &quot;Merl&quot;,
            &quot;last_name&quot;: &quot;Strosin&quot;
        },
        &quot;queue&quot;: 1,
        &quot;room_number&quot;: 53,
        &quot;status&quot;: &quot;BOOKED&quot;,
        &quot;booking_date&quot;: &quot;2022-11-14 23:59&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-appointment--user_uuid-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appointment--user_uuid-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appointment--user_uuid-"></code></pre>
</span>
<span id="execution-error-POSTapi-appointment--user_uuid-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appointment--user_uuid-"></code></pre>
</span>
<form id="form-POSTapi-appointment--user_uuid-" data-method="POST"
      data-path="api/appointment/{user_uuid}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appointment--user_uuid-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appointment--user_uuid-"
                    onclick="tryItOut('POSTapi-appointment--user_uuid-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appointment--user_uuid-"
                    onclick="cancelTryOut('POSTapi-appointment--user_uuid-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appointment--user_uuid-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appointment/{user_uuid}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>user_uuid</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="user_uuid"
               data-endpoint="POSTapi-appointment--user_uuid-"
               value="1"
               data-component="url" hidden>
    <br>

            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>passport</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="passport"
               data-endpoint="POSTapi-appointment--user_uuid-"
               value="aliquam"
               data-component="body" hidden>
    <br>
<p>Идентификатор пасспорта</p>
        </p>
                <p>
            <b><code>booking_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="booking_date"
               data-endpoint="POSTapi-appointment--user_uuid-"
               value="ipsa"
               data-component="body" hidden>
    <br>
<p>Время встречи. Формат: Y-m-d H:i:s Пример: 2022-11-11 12:00:00</p>
        </p>
        </form>

                    <h2 id="endpoints-PATCHapi-appointment--appointment_uuid-">Change status
Смена статуса</h2>

<p>
</p>



<span id="example-requests-PATCHapi-appointment--appointment_uuid-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost/api/appointment/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"status\": \"modi\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appointment/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "status": "modi"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-appointment--appointment_uuid-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;uuid&quot;: &quot;453f9a5d-b2a5-4ac7-996f-cddc4f3b5539&quot;,
        &quot;doctor&quot;: {
            &quot;uuid&quot;: &quot;aee58d95-a7e5-321a-addb-55bf9618bed5&quot;,
            &quot;name&quot;: &quot;Ms. Bessie Ryan&quot;
        },
        &quot;patient&quot;: {
            &quot;uuid&quot;: &quot;cf000f75-cb5d-4fc9-a804-9bed3d25395e&quot;,
            &quot;first_name&quot;: &quot;Merl&quot;,
            &quot;last_name&quot;: &quot;Strosin&quot;
        },
        &quot;queue&quot;: 1,
        &quot;room_number&quot;: 53,
        &quot;status&quot;: &quot;CANCELED&quot;,
        &quot;booking_date&quot;: &quot;2022-11-14 23:59&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-appointment--appointment_uuid-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-appointment--appointment_uuid-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-appointment--appointment_uuid-"></code></pre>
</span>
<span id="execution-error-PATCHapi-appointment--appointment_uuid-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-appointment--appointment_uuid-"></code></pre>
</span>
<form id="form-PATCHapi-appointment--appointment_uuid-" data-method="PATCH"
      data-path="api/appointment/{appointment_uuid}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-appointment--appointment_uuid-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-appointment--appointment_uuid-"
                    onclick="tryItOut('PATCHapi-appointment--appointment_uuid-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-appointment--appointment_uuid-"
                    onclick="cancelTryOut('PATCHapi-appointment--appointment_uuid-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-appointment--appointment_uuid-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/appointment/{appointment_uuid}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>appointment_uuid</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="appointment_uuid"
               data-endpoint="PATCHapi-appointment--appointment_uuid-"
               value="1"
               data-component="url" hidden>
    <br>

            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="status"
               data-endpoint="PATCHapi-appointment--appointment_uuid-"
               value="modi"
               data-component="body" hidden>
    <br>
<p>Статус исполение</p>
        </p>
        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>

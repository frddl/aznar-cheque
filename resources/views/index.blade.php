<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AZNAR CHEQUECHECK</title>
    <link rel="stylesheet" href="css/tailwind.min.css"/>
</head>

<body>
<div>
    <nav class="bg-purple-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="block">
                        <div class="flex items-baseline">
                            <a href="#"
                               class="px-3 py-2 rounded-md text-sm font-medium text-white bg-purple-900 focus:outline-none focus:text-white focus:bg-gray-700">
                                Marline Agency
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold leading-tight text-gray-900">
                AZNAR ChequeCheck
            </h1>
        </div>
    </header>
    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8" id="app">
            <div class="px-4 py-6 sm:px-0">
                <input
                    class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 block w-full appearance-none leading-normal"
                    type="text"
                    placeholder="Fiscal ID"
                    v-model="id"
                >

                <button v-if="id != null && id.length == 12" v-on:click="check"
                        class="bg-purple-700 hover:bg-purple-900 text-white font-bold mt-5 py-2 px-4 rounded">
                    Проверить
                </button>

                <div v-if="id == null || id.length != 12"
                     class="bg-teal-100 border-t-4 mt-5 border-teal-500 rounded text-teal-900 px-4 py-3 shadow-md"
                     role="alert">
                    <div class="flex">
                        <div class="py-1">
                            <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">
                                <path
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold">Fiscal ID</p>
                            <p class="text-sm">Длина фискального айди должна быть 12 символов.</p>
                        </div>
                    </div>
                </div>

                <div v-if="state.message != null" v-bind:class="state.items != null ? state.items.length > 0 ? 'bg-green-500' : 'bg-red-500' : 'bg-yellow-500'"
                     class="flex items-center text-white text-sm font-bold mt-5 px-4 py-3 rounded-b" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/>
                    </svg>
                    <p>@{{ state.message }}</p>
                </div>

                <div v-for="item in state.items" class="mt-5 px-4 py-3 rounded-b overflow-hidden shadow-lg">
                    <div class="px-6 py-4">
                        <div class="font-bold mb-2">@{{ item.itemName }}</div>
                        <p class="text-gray-700 text-base">@{{ item.itemPrice }} ₼</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="js/vue.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>

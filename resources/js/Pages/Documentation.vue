<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {
    IconInfoCircle,
    IconDownload
} from "@tabler/icons-vue";
</script>

<template>
    <AppLayout title="Documentation">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4">
            <div class="col-span-1 md:col-span-2 lg:col-span-1 relative">
                <div class="bg-white min-h-screen -ml-8 -mt-10 p-4 pr-32 -mb-10 fixed z-10 shadow-md">
                    <ul class="mt-4 space-y-2 text-gray-600 ml-4">
                        <li>
                            <a href="#introduction" class="flex items-center">
                                <IconInfoCircle class="w-5 h-5 mr-2"/>
                                Introduction
                            </a>
                        </li>
                        <li>
                            <a href="#installation" class="flex items-center">
                                <IconDownload class="w-5 h-5 mr-2"/>
                                Installation
                            </a>
                        </li>
                    </ul>

                    <h2 class="text-xl font-semibold text-gray-800 leading-tight mt-10">
                        API
                    </h2>
                    <ul class="mt-4 space-y-2 text-gray-600 ml-4">
                        <li>
                            <a href="#api-endpoints" class="flex items-center">
                                <IconInfoCircle class="w-5 h-5 mr-2"/>
                                API Endpoints
                            </a>
                        </li>
                        <li>
                            <a href="#api-requests" class="flex items-center">
                                <IconDownload class="w-5 h-5 mr-2"/>
                                API Requests
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-span-1 md:col-span-2 lg:col-span-5 p-6 space-y-16">
                <div id="introduction">
                    <h3 class="text-2xl font-semibold text-gray-800 leading-tight">
                        Introduction
                    </h3>
                    <div class="mt-2 text-gray-600">
                        <p>
                            This application is an example for Global Tickets.
                        </p>
                        <p class="mt-4">
                            The application is built using Laravel, Vue.js, and Jetstream. For the front-end, Tailwind
                            CSS with
                            Shadcn UI is used. The application is a "simple" URL shortener. You can create short links,
                            view
                            them, and delete them.
                        </p>
                        <p class="mt-4">
                            <p class="font-semibold">
                                Main technologies used:
                            </p>
                            <ul class="list-disc pl-4">
                                <li>
                                    <a href="https://laravel.com" class="text-blue-500 hover:underline" target="_blank">Laravel</a>
                                </li>
                                <li>
                                    <a href="https://vuejs.org" class="text-blue-500 hover:underline" target="_blank">Vue.js</a>
                                </li>
                                <li>
                                    <a href="https://jetstream.laravel.com" class="text-blue-500 hover:underline"
                                       target="_blank">Jetstream</a>
                                </li>
                                <li>
                                    <a href="https://tailwindcss.com" class="text-blue-500 hover:underline"
                                       target="_blank">Tailwind CSS</a>
                                </li>
                                <li>
                                    <a href="https://www.shadcn-vue.com/docs/" class="text-blue-500 hover:underline"
                                       target="_blank">Shadcn UI</a>
                                </li>
                            </ul>
                            <p class="mt-4">
                                Extra packages used:
                            </p>
                            <ul class="list-disc pl-4">
                                <li>
                                    <a href="https://tabler.io/icons/" class="text-blue-500 hover:underline"
                                       target="_blank">Tabler Icons</a>
                                </li>
                                <li>
                                    <a href="https://heroicons.com" class="text-blue-500 hover:underline"
                                       target="_blank">Heroicons</a>
                                </li>
                            </ul>
                            <p class="mt-4">
                                Example application created by <a href="https://linkedin/in/cytorick"
                                                                  class="text-blue-500 hover:underline" target="_blank">Rick
                                Visser</a>.
                            </p>
                        </p>
                    </div>
                </div>

                <hr>

                <div id="installation">
                    <h3 class="text-2xl font-semibold text-gray-800 leading-tight">
                        Installation
                    </h3>
                    <div class="mt-2 text-gray-600">
                        <p>
                            For the installation of this application, you need to have the following software installed:
                        </p>
                        <ul class="list-disc pl-4">
                            <li>
                                <a href="https://getcomposer.org" class="text-blue-500 hover:underline" target="_blank">Composer</a>
                            </li>
                            <li>
                                <a href="https://nodejs.org" class="text-blue-500 hover:underline" target="_blank">Node.js</a>
                            </li>
                            <li>
                                <a href="https://www.npmjs.com" class="text-blue-500 hover:underline" target="_blank">NPM</a>
                            </li>
                            <li>
                                <a href="https://www.mysql.com" class="text-blue-500 hover:underline" target="_blank">MySQL</a>
                            </li>
                            <li>
                                <a href="https://www.php.net" class="text-blue-500 hover:underline"
                                   target="_blank">PHP</a>
                            </li>
                            <li>
                                <a href="https://herd.laravel.com" class="text-blue-500 hover:underline"
                                   target="_blank">Laravel Herd</a> (optional)
                            </li>
                        </ul>

                        <p class="mt-4">
                            To install the application, you need to follow these steps:
                        </p>

                        <h3 class="text-md font-semibold text-gray-800 leading-tight mt-4">
                            Clone the repository
                        </h3>
                        <p>
                            To clone the repository, you need to run the following command:
                        </p>
                        <div class="bg-white p-4 rounded-lg mt-4">
                            <code class="text-sm text-gray-800">
                                git clone
                            </code>
                        </div>

                        <h3 class="text-md font-semibold text-gray-800 leading-tight mt-4">
                            Run composer install
                        </h3>
                        <p>
                            To install the PHP dependencies, you need to run the following command:
                        </p>
                        <div class="bg-white p-4 rounded-lg mt-4">
                            <code class="text-sm text-gray-800">
                                composer install
                            </code>
                        </div>

                        <h3 class="text-md font-semibold text-gray-800 leading-tight mt-4">
                            Run npm install
                        </h3>
                        <p>
                            To install the JavaScript dependencies, you need to run the following command:
                        </p>
                        <div class="bg-white p-4 rounded-lg mt-4">
                            <code class="text-sm text-gray-800">
                                npm install
                            </code>
                        </div>

                        <h3 class="text-md font-semibold text-gray-800 leading-tight mt-4">
                            Run npm run dev
                        </h3>
                        <p>
                            To compile the assets, you need to run the following command:
                        </p>
                        <div class="bg-white p-4 rounded-lg mt-4">
                            <code class="text-sm text-gray-800">
                                npm run dev
                            </code>
                        </div>

                        <h3 class="text-md font-semibold text-gray-800 leading-tight mt-4">
                            Create a database
                        </h3>
                        <p>
                            To create a database, you need to run the following command:
                        </p>
                        <div class="bg-white p-4 rounded-lg mt-4">
                            <code class="text-sm text-gray-800">
                                mysql -u root -p
                            </code>
                        </div>

                        <h3 class="text-md font-semibold text-gray-800 leading-tight mt-4">
                            Copy the .env.example file to .env
                        </h3>
                        <p>
                            To copy the <code>.env.example</code> file to <code>.env</code>, you need to run the
                            following
                            command:
                        </p>
                        <div class="bg-white p-4 rounded-lg mt-4">
                            <code class="text-sm text-gray-800">
                                cp .env.example .env
                            </code>
                        </div>

                        <h3 class="text-md font-semibold text-gray-800 leading-tight mt-4">
                            Set the database credentials in the .env file
                        </h3>
                        <p>
                            To set the database credentials in the <code>.env</code> file, you need to open the file and
                            set the following values:
                        </p>
                        <div class="bg-white p-4 rounded-lg mt-4">
                            <code class="text-sm text-gray-800">
                                DB_DATABASE=your_database_name <br>
                                DB_USERNAME=your_database_username <br>
                                DB_PASSWORD=your_database_password <br>
                            </code>
                        </div>

                        <h3 class="text-md font-semibold text-gray-800 leading-tight mt-4">
                            Run php artisan migrate
                        </h3>
                        <p>
                            To run the migrations, you need to run the following command:
                        </p>
                        <div class="bg-white p-4 rounded-lg mt-4">
                            <code class="text-sm text-gray-800">
                                php artisan migrate
                            </code>
                        </div>

                        <h3 class="text-md font-semibold text-gray-800 leading-tight mt-4">
                            Run php artisan serve
                        </h3>
                        <p>
                            To run the application, you need to run the following command:
                        </p>
                        <div class="bg-white p-4 rounded-lg mt-4">
                            <code class="text-sm text-gray-800">
                                php artisan serve
                            </code>
                        </div>
                    </div>
                </div>

                <hr>

                <div id="api-endpoints">
                    <h3 class="text-2xl font-semibold text-gray-800 leading-tight">
                        API Endpoints
                    </h3>
                    <div class="mt-2 text-gray-600">
                        <p>
                            The application has the following API endpoints:
                        </p>
                        <ul class="list-disc pl-4">
                            <li>
                                <code class="text-sm text-gray-800">
                                    GET /api/shortlinks
                                </code>
                            </li>
                            <li>
                                <code class="text-sm text-gray-800">
                                    POST /api/shortlinks
                                </code>
                            </li>
                            <li>
                                <code class="text-sm text-gray-800">
                                    GET /api/shortlinks/{id}
                                </code>
                            </li>
                            <li>
                                <code class="text-sm text-gray-800">
                                    PUT /api/shortlinks/{id}
                                </code>
                            </li>
                            <li>
                                <code class="text-sm text-gray-800">
                                    DELETE /api/shortlinks/{id}
                                </code>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="api-requests">
                    <h3 class="text-2xl font-semibold text-gray-800 leading-tight">
                        Viewing all Short Links
                    </h3>
                    <div class="mt-2 text-gray-600">
                        <p>
                            To view all short links, you need to send a GET request to the following endpoint:
                        </p>
                        <div class="bg-white p-4 rounded-lg mt-4">
                            <code class="text-sm text-gray-800">
                                GET /api/shortlinks
                            </code>
                        </div>
                    </div>

                    <h3 class="text-2xl font-semibold text-gray-800 leading-tight mt-10">
                        Viewing a Single Short Link
                    </h3>
                    <div class="mt-2 text-gray-600">
                        <p>
                            To view a single short link, you need to send a GET request to the following endpoint:
                        </p>
                        <div class="bg-white p-4 rounded-lg mt-4">
                            <code class="text-sm text-gray-800">
                                GET /api/shortlinks/{id}
                            </code>
                        </div>
                    </div>

                    <h3 class="text-2xl font-semibold text-gray-800 leading-tight mt-10">
                        Viewing a Single Short Link clicks
                    </h3>
                    <div class="mt-2 text-gray-600">
                        <p>
                            To view a single short link clicks, you need to send a GET request to the following endpoint:
                        </p>
                        <div class="bg-white p-4 rounded-lg mt-4">
                            <code class="text-sm text-gray-800">
                                GET /api/shortlinks/{id}/clicks
                            </code>
                        </div>
                    </div>

                    <h3 class="text-2xl font-semibold text-gray-800 leading-tight mt-10">
                        Creating a Short Link
                    </h3>
                    <div class="mt-2 text-gray-600">
                        <p>
                            To create a short link, you need to send a POST request to the following endpoint:
                        </p>
                        <div class="bg-white p-4 rounded-lg mt-4">
                            <code class="text-sm text-gray-800">
                                POST /api/shortlinks
                            </code>
                        </div>
                        <p class="mt-4">
                            The request should contain the following parameters:
                        </p>
                        <ul class="list-disc pl-4 mt-2 space-y-1">
                            <li>
                                <code class="text-sm text-gray-800">
                                    name
                                </code>
                                - The name of the short link
                            </li>
                            <li>
                                <code class="text-sm text-gray-800">
                                    destination
                                </code>
                                - The destination URL you want to shorten
                            </li>
                            <li>
                                <code class="text-sm text-gray-800">
                                    url
                                </code>
                                - The custom short URL you want to use (optional)
                            </li>
                            <li>
                                <code class="text-sm text-gray-800">
                                    expires_at
                                </code>
                                - The expiration date of the short link (optional)
                            </li>
                        </ul>
                    </div>

                    <h3 class="text-2xl font-semibold text-gray-800 leading-tight mt-10">
                        Updating a Short Link
                    </h3>
                    <div class="mt-2 text-gray-600">
                        <p>
                            To update a short link, you need to send a PUT request to the following endpoint:
                        </p>
                        <div class="bg-white p-4 rounded-lg mt-4">
                            <code class="text-sm text-gray-800">
                                PUT /api/shortlinks/{id}
                            </code>
                        </div>
                        <p class="mt-4">
                            The request should contain the following parameters:
                        </p>
                        <ul class="list-disc pl-4 mt-2 space-y-1">
                            <li>
                                <code class="text-sm text-gray-800">
                                    name
                                </code>
                                - The name of the short link
                            </li>
                            <li>
                                <code class="text-sm text-gray-800">
                                    destination
                                </code>
                                - The destination URL you want to shorten
                            </li>
                            <li>
                                <code class="text-sm text-gray-800">
                                    url
                                </code>
                                - The custom short URL you want to use (optional)
                            </li>
                            <li>
                                <code class="text-sm text-gray-800">
                                    expires_at
                                </code>
                                - The expiration date of the short link (optional)
                            </li>
                        </ul>
                    </div>

                    <h3 class="text-2xl font-semibold text-gray-800 leading-tight mt-10">
                        Deleting a Short Link
                    </h3>
                    <div class="mt-2 text-gray-600">
                        <p>
                            To delete a short link, you need to send a DELETE request to the following endpoint:
                        </p>
                        <div class="bg-white p-4 rounded-lg mt-4">
                            <code class="text-sm text-gray-800">
                                DELETE /api/shortlinks/{id}
                            </code>
                        </div>
                    </div>

                </div>

                </div>
            </div>
    </AppLayout>
</template>

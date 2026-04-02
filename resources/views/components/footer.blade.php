@props(['school'])

<footer class="bg-white dark:bg-gray-900 mt-24 border">
    <div class="mx-auto w-full max-w-screen-xl px-4 py-6 lg:py-8">
        
        <!-- TOP -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-8">
            
            <!-- LOGO + NAMA -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left">
                <a href="#" class="flex flex-col md:flex-row items-center gap-3">
                    <img 
                        src="{{ 
                            $school->logo
                                ? (str_contains($school->logo, 'https')
                                    ? $school->logo
                                    : asset('storage/' . $school->logo))
                                : asset('img/default-pp.jpg') 
                        }}" 
                        class="w-16 md:w-20"
                        alt="Logo" 
                    />
                    <span class="text-lg md:text-2xl font-bold dark:text-white">
                        {{ $school ? $school->name : "Sibooks" }}
                    </span>
                </a>
            </div>

            <!-- LINK -->
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 text-center md:text-left">
                <div>
                    <h2 class="mb-3 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                        Follow us
                    </h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium space-y-2">
                        <li>
                            <a href="https://www.instagram.com/smkalmadanigarut/" class="hover:underline">
                                Instagram
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">
                                Discord
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <!-- LINE -->
        <hr class="my-6 border-gray-200 dark:border-gray-700 lg:my-8" />

        <!-- BOTTOM -->
        <div class="flex flex-col sm:flex-row justify-center items-center text-center gap-2">
            <span class="text-sm text-gray-500 dark:text-gray-400">
                © 2026 {{ $school ? $school->name : "Sibooks" }}. All Rights Reserved.
            </span>
        </div>

    </div>
</footer>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<footer class="py-8 mt-8 border-t bg-gray-200 justify-self-end" style="height: 300px;">
    <x-container>
        <div class="flex h-full">
            <!-- Logo on the Left -->
            <div class="flex flex-col justify-center mr-8">
                <img src="{{ asset('images/logo1.png') }}" alt="Logo" width="100px">
            </div>

            <!-- Links and Contact Info -->
            <div class="flex-grow flex justify-between">
                <!-- Links Section -->
                <div>
                    <h3 class="text-lg font-semibold mb-2">Links</h3>
                    <ul class="space-y-1">
                        <li>
                            <span class="font-bold">
                                <i class="fab fa-facebook"></i> Barangay Sto. Rosario Silangan Facebook:
                            </span>
                            <a href="https://facebook.com/profile.php?id=61553585558306" target="_blank"
                                class="text-blue-600 hover:underline">
                                facebook.com/profile.php?id=61553585558306
                            </a>
                        </li>
                        <li>
                            <span class="font-bold">
                                <i class="fas fa-globe"></i> Pateros website:
                            </span>
                            <a href="https://www.pateros.com" target="_blank" class="text-blue-600 hover:underline">
                                www.pateros.com
                            </a>
                        </li>
                        <li>
                            <span class="font-bold">
                                <i class="fab fa-facebook"></i> Pateros Facebook:
                            </span>
                            <a href="https://facebook.com/isangPateros/" target="_blank"
                                class="text-blue-600 hover:underline">
                                facebook.com/isangPateros/
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info Section -->
                <div>
                    <h3 class="text-lg font-semibold mb-2">Contact us</h3>
                    <p class="mb-1">
                        <i class="fas fa-envelope"></i> BatangSilangan01@gmail.com
                    </p>
                    <p class="mb-1">
                        <i class="fas fa-map-marker-alt"></i> Felix Avila, Pateros, Philippines, 1620
                    </p>
                    <p>
                        <i class="fas fa-phone"></i> 286812435
                    </p>
                </div>
            </div>
        </div>

        <!-- Bottom Section with Copyright Info -->
        <div class="text-xs text-gray-800/50 text-center mt-4">
            &copy; {{ date('Y') }} {{ config('app.name') }}
        </div>
    </x-container>
</footer>

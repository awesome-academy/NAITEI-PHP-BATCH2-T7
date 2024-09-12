<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product['name'] }} - My Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css"  rel="stylesheet" />
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navigation Bar -->
    @include('layouts.navigation')
    @include('components.cart-side-bar')

    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                    <img class="w-full dark:hidden" src="{{ asset("storage/" . $product->image_url) }}" alt="{{ $product->image_url }}" />
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                        {{ $product->name }}
                    </h1>
                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                            ${{ $product->price }}
                        </p>

                        <div class="flex items-center gap-2 mt-2 sm:mt-0">
                            @for ($i = 0; $i < floor($userReviewAverage); $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" width="21.87" height="20.801"
                                    class="text-yellow-400 fill-current">
                                    <path
                                        d="m4.178 20.801 6.758-4.91 6.756 4.91-2.58-7.946 6.758-4.91h-8.352L10.936 0 8.354 7.945H0l6.758 4.91-2.58 7.946z" />
                                </svg>
                            @endfor
                            @for ($i = floor($userReviewAverage); $i < 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" width="21.87" height="20.801"
                                    class="text-gray-300 fill-current">
                                    <path
                                        d="m4.178 20.801 6.758-4.91 6.756 4.91-2.58-7.946 6.758-4.91h-8.352L10.936 0 8.354 7.945H0l6.758 4.91-2.58 7.946z" />
                                </svg>
                            @endfor
                        </div>
                        <p class="text-sm font-medium leading-none text-gray-500 dark:text-gray-400">
                            ({{ number_format($userReviewAverage, 1) }})
                        </p>
                        <a href="#"
                            class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline dark:text-white">
                            {{ $userReviewCount }} Reviews
                        </a>
                    </div>

                    <div class="sm:gap-4 sm:items-center sm:flex sm:mt-8">
                        <form
                            action="{{ route('cart.update', ['order_item_id' => $product['id'], 'price' => $product['price']]) }}"
                            method="POST">
                            @csrf
                            @method('POST')
                            <div class="mt-6">
                                <label class="" for="quantity">Quantity (between 1 and 5):</label>
                                <input class="ml-6" type="number" id="quantity" name="quantity" value="1" min="1" max="5" />
                            </div>

                            <div class="mt-6">
                                <button type="submit"
                                    class="inline items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Add
                                    to
                                    cart
                                </button>

                                <a href="#" title=""
                                    class="text-white mt-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none inline items-center justify-center"
                                    role="button">
                                    Buy now
                                </a>
                            </div>
                        </form>
                    </div>
                    <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />
                    <p class="mb-6 text-gray-500 dark:text-gray-400">
                        {{ $product->description}}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Feedback Section -->
    <section class="w-1/2 mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-800">Customer Feedback</h2>

        @forelse ($userReviews as $userReview)
            <div class="bg-white p-4 mt-4 rounded-lg shadow">
                <div class="flex items-center inline-flex">
                    <!-- Feedback Rating -->
                    @for ($i = 0; $i < floor($userReview['rating']); $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" width="21.87" height="20.801"
                            class="text-yellow-400 fill-current">
                            <path
                                d="m4.178 20.801 6.758-4.91 6.756 4.91-2.58-7.946 6.758-4.91h-8.352L10.936 0 8.354 7.945H0l6.758 4.91-2.58 7.946z" />
                        </svg>
                    @endfor
                    @for ($i = $userReview['rating']; $i < 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" width="21.87" height="20.801"
                            class="text-gray-300 fill-current">
                            <path
                                d="m4.178 20.801 6.758-4.91 6.756 4.91-2.58-7.946 6.758-4.91h-8.352L10.936 0 8.354 7.945H0l6.758 4.91-2.58 7.946z" />
                        </svg>
                    @endfor
                    <a class="ml-4">Edit</a>
                    <a class="ml-4">Delete</a>
                </div>
                <p class="mt-2 text-gray-600">{{ $userReview['comment'] }}</p>
            </div>
        @empty
            <p class="mt-4 text-gray-600">No feedback available for this product.</p>
        @endforelse
    </section>

    <!-- Footer -->
    @include('layouts.footer')
</body>

</html>
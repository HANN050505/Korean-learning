<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-[80vh]">
        
        <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-2xl border border-gray-100 relative overflow-hidden transform transition-all">
            
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 to-purple-600"></div>

            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-blue-50 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>
            </div>

            <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">
                Verifikasi Email
            </h2>

            <div class="mb-6 text-sm text-gray-600 text-center leading-relaxed">
                {{ __('Terima kasih telah mendaftar! Sebelum memulai, mohon verifikasi alamat email kamu dengan mengklik link yang baru saja kami kirimkan. Jika tidak masuk, kami bisa mengirimnya lagi.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 p-4 bg-green-50 rounded-lg border border-green-100">
                    <div class="flex">
                        <svg class="h-5 w-5 text-green-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="text-sm font-medium text-green-700">
                            {{ __('Link verifikasi baru telah dikirim ke email kamu.') }}
                        </p>
                    </div>
                </div>
            @endif

            <div class="space-y-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-semibold text-white bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors">
                        {{ __('Kirim Ulang Email Verifikasi') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-center text-sm text-gray-500 hover:text-gray-800 font-medium transition-colors">
                        {{ __('Keluar (Log Out)') }}
                    </button>
                </form>
            </div>
        </div>
        
        <p class="mt-8 text-xs text-gray-400">
            &copy; {{ date('Y') }} Translate Korea. All rights reserved.
        </p>
    </div>
</x-guest-layout>
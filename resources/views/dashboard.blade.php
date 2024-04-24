<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mt-6">


                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Oluşturma Tarihi
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Durum
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tip
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Backup/Dosya İsmi
                                        </th>
                                        <th>
                                            Boş Disk Alanı
                                        </th>
                                        <th scope="col" class="px-6 py-3">-</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="px-6 py-4">
                                                {{ $transaction->created_at->format('d-m-Y H:i:s') }}
                                            </td>
                                            <td class="px-6 py-4 capitalize">
                                                {{ $transaction->type }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                {{ $transaction->db_name ? 'Veritabanı Yedekleme' : 'Defter Yedekleme' }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                {{ $transaction->backup_name ?? $transaction->file_name }}
                                            </td>
                                            <td class="px-6 py-4 ">
                                                {{ $transaction->remaining_disk_space }}
                                            </td>

                                        </tr>

                                        {{-- <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $user->name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $user->email }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $user->vkn }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $user->license_finish }}
                                            </td>
                                            <td>
                                                <a href="{{ route('users.edit', $user) }}"
                                                    class="btn btn-black">Düzenle</a>
                                            </td>
                                        </tr> --}}
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <div class="mt-2">
                            {{ $transactions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

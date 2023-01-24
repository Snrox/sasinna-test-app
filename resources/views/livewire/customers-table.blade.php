<div>
    <div class="max-w-5xl mx-auto">

        <div class="flex flex-col">
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Mobile
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Nic
                                    </th>
                                    <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Province
                                    </th>
                                    <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        District
                                    </th>
                                    <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Town
                                    </th>
                                    <th scope="col" class="p-4">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    <th scope="col" class="p-4">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody
                                class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                
                                
                                    @foreach ($customers as $customer)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$customer->name}}
                                            </td>

                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$customer->mobile}}
                                            </td>

                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$customer->nic}}
                                            </td>

                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$customer->province($customer->province_id)}}
                                            </td>
                                        
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$customer->district($customer->district_id)}}
                                            </td>

                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$customer->town($customer->town_id)}}
                                            </td>

                                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                <button class="text-blue-600 dark:text-blue-500 hover:underline" wire:click="edit({{$customer->id}})" >Edit</button>
                                            </td>

                                            <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                <button class="text-blue-600 dark:text-red-500 hover:underline" wire:click="delete({{$customer->id}})" >Delete</button>
                                            </td>

                                    </tr>
                                    @endforeach
                                   
                             
                             
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                {{ $customers->links() }}
            </div>
        </div>
    </div>

    @if ($edit_modal_show == true)
    <div class="bg-slate-800 bg-opacity-50 flex justify-center items-center absolute top-0 right-0 bottom-0 left-0">
        <div class="bg-white px-16 py-14 rounded-md text-center">
            @if (session()->has('message'))
            <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div>
                    <span class="font-medium">{{ session('message') }}</span>
                </div>
            </div>
          @endif
            <form class="pt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="grid grid-cols-2 gap-2 border border-gray-200 p-2 rounded">
                    <h2>Name</h2>
                    <div class="flex border rounded bg-gray-300 items-center p-2 h-12">
                        <svg class="fill-current text-gray-800 mr-2 w-5" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui"
                                d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z" />
                        </svg>
                        <input wire:model="name" required type="text" placeholder="Name"
                            class="bg-gray-300 max-w-full focus:outline-none text-gray-700" />
                    </div>
        
                    <h2>Mobile</h2>
                    <div class="flex border rounded bg-gray-300 items-center p-2 h-12">
                        <svg class="fill-current text-gray-800 mr-2 w-5" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui"
                                d="M13.04 14.69l1.07-2.14a1 1 0 0 1 1.2-.5l6 2A1 1 0 0 1 22 15v5a2 2 0 0 1-2 2h-2A16 16 0 0 1 2 6V4c0-1.1.9-2 2-2h5a1 1 0 0 1 .95.68l2 6a1 1 0 0 1-.5 1.21L9.3 10.96a10.05 10.05 0 0 0 3.73 3.73zM8.28 4H4v2a14 14 0 0 0 14 14h2v-4.28l-4.5-1.5-1.12 2.26a1 1 0 0 1-1.3.46 12.04 12.04 0 0 1-6.02-6.01 1 1 0 0 1 .46-1.3l2.26-1.14L8.28 4zm7.43 5.7a1 1 0 1 1-1.42-1.4L18.6 4H16a1 1 0 0 1 0-2h5a1 1 0 0 1 1 1v5a1 1 0 0 1-2 0V5.41l-4.3 4.3z" />
                        </svg>
                        <input  wire:model="mobile" required type="number" placeholder="Mobile"
                            class="bg-gray-300 max-w-full focus:outline-none text-gray-700" />
                    </div>
        
                    <h2>NIC</h2>
                    <div class="flex border rounded bg-gray-300 items-center p-2 h-12">
                        <svg class="fill-current text-gray-800 mr-2 w-5" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" width="24" height="24">
                            <path class="heroicon-ui"
                                d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zM5.68 7.1A7.96 7.96 0 0 0 4.06 11H5a1 1 0 0 1 0 2h-.94a7.95 7.95 0 0 0 1.32 3.5A9.96 9.96 0 0 1 11 14.05V9a1 1 0 0 1 2 0v5.05a9.96 9.96 0 0 1 5.62 2.45 7.95 7.95 0 0 0 1.32-3.5H19a1 1 0 0 1 0-2h.94a7.96 7.96 0 0 0-1.62-3.9l-.66.66a1 1 0 1 1-1.42-1.42l.67-.66A7.96 7.96 0 0 0 13 4.06V5a1 1 0 0 1-2 0v-.94c-1.46.18-2.8.76-3.9 1.62l.66.66a1 1 0 0 1-1.42 1.42l-.66-.67zM6.71 18a7.97 7.97 0 0 0 10.58 0 7.97 7.97 0 0 0-10.58 0z" />
                        </svg>
                        <input  wire:model="nic" required type="text" placeholder="NIC"
                            class="bg-gray-300 max-w-full focus:outline-none text-gray-700" />
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-2 border border-gray-200 p-2 rounded">
                 
                    <div class="pt-6 md:pt-0 md:pl-6">
                        <h2>Province</h2>
                        <select wire:model="province_id" class="border p-2 rounded bg-gray-300 max-w-full focus:outline-none text-gray-700">
                            @foreach ($provinceData as $province)
                              <option value="{{$province->id}}">{{$province->name_en}}</option>
                            @endforeach
                        </select>
                    </div>
        
                    <div class="pt-6 md:pt-0 md:pl-6">
                        <h2>District</h2>
                        <select wire:model="district_id" class="border p-2 rounded bg-gray-300 max-w-full focus:outline-none text-gray-700">
                            @foreach ($districtData as $district)
                             <option value="{{$district->id}}">{{$district->name}}</option> 
                            @endforeach
                        </select>
                    </div>
        
                    <div class="pt-6 md:pt-0 md:pl-6">
                        <h2>Town</h2>
                        <select wire:model="town_id" class="border p-2 rounded bg-gray-300 max-w-full focus:outline-none text-gray-700">
                            $@foreach ($townData as $town)
                              <option value="{{$town->id}}">{{$town->name}}</option>
                            @endforeach
                        </select>
                    </div>
                   
               
        
                </div>
                <div type="button" wire:click.prevent="update" class="flex justify-center pt-6"><button
                    class="p-2 border w-1/4 rounded-md bg-gray-800 text-white">save</button>
              </div>
              <div type="button" wire:click.prevent="modalClose" class="flex justify-center pt-6"><button
                class="p-2 border w-1/4 rounded-md bg-red-800 text-white">close</button>
             </div>
            </form>
        </div>
      </div>
    @endif




</div>

 @php
     $policyAll = App\Models\Policy::all();


     $settingAddress = App\Models\Setting::where('setting_key', 'setting_address')->value('setting_value') ?? '1073/23 Cách Mạng Tháng 8, P.7, Q.Tân Bình, TP.HCM';
     $settingPhone = App\Models\Setting::where('setting_key', 'setting_phone')->value('setting_value') ?? '012345678';
     $settingEmail = App\Models\Setting::where('setting_key', 'setting_email')->value('setting_value') ?? ' info@themona.global';
 @endphp

 <footer class="bg-[#fff8ec] py-6 px-[10px]">
     <div class="container max-w-[1170px] mx-auto   items-center h-full ">
         <div class="grid grid-cols-1  md:grid-cols-4 lg:grid-cols-4">
             <div class="col-span-1">
                 <div class="w-3/4">
                     <img src="{{ asset('images/client/MONA-e1702621831263.png') }}" />
                 </div>
                 <div class="mt-3 w-full">
                     <div class="flex mt-2">
                         <div>
                             <ion-icon class="text-[20px]" name="location"></ion-icon>
                         </div>
                         <div class="ml-2 text-sm text-[#666666]">
                             {{ $settingAddress }}
                         </div>
                     </div>

                     <div class="flex mt-2">
                         <div>
                             <ion-icon class="text-[20px]" name="call"></ion-icon>
                         </div>
                         <div class="ml-2 text-sm text-[#666666]">
                             {{ $settingPhone }}
                         </div>
                     </div>

                     <div class="flex mt-2">
                         <div>
                             <ion-icon class="text-[20px]" name="mail"></ion-icon>
                         </div>
                         <div class="ml-2 text-sm text-[#666666]">
                             {{ $settingEmail}}
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-span-1 mt-10 md:mt-0 lg:mt-0">
                 <div class="flex justify-items-center w-full">
                     <div class=" md:ml-5  lg:ml-10 w-full">
                         <h3 class="uppercase  font-semibold">dịch vụ</h3>
                         <div class="">
                             <ul>
                                 <li class="mt-1">
                                     <a class="block text-sm text-[#666666]" href="">Chăm sóc khác hàng</a>
                                 </li>
                                 <li class="mt-1">
                                     <a class="block text-sm text-[#666666]" href="">Bảo hiểm điện thoại</a>
                                 </li>
                                 <li class="mt-1">
                                     <a class="block text-sm text-[#666666]" href="">Thanh toán</a>
                                 </li>
                                 <li class="mt-1">
                                     <a class="block text-sm text-[#666666]" href="">Sửa chữa bảo hành</a>
                                 </li>

                             </ul>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-span-1 mt-10 md:mt-0 lg:mt-0">
                 <div class="flex justify-items-center">
                     <div class="md:ml-5  lg:ml-10 w-full">
                         <h3 class="uppercase  font-semibold">chính sách & hỗ trợ</h3>
                         <div class="">
                             <ul>
                                 @if (count($policyAll) > 0)
                                     @foreach ($policyAll as $item)
                                         <li class="mt-1">
                                             <a class="block text-sm text-[#666666]"
                                                 href="">{{ $item->name }}</a>
                                         </li>
                                     @endforeach

                                 @endif


                             </ul>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-span-1 mt-10 md:mt-0 lg:mt-0 md:ml-5">
                 <div class="  border-2 border-solid border-[#ff5b26]">
                     <!-- Test -->
                     <div class="h-full ">
                        <iframe class="" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7449.386670626952!2d105.79199407673504!3d21.004926446910275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1732724973667!5m2!1sen!2s" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>

                     <!-- End Test -->
                 </div>
             </div>
         </div>
     </div>
 </footer>

<tr class="tr">

    <td class="main-item" data-column="نام فایل ">
        <a href="{{route('single_product' , [$favorite->slug , $favorite->id])}}">
            {{ $favorite->name }}
        </a>
    </td>
    <td class="date" data-column="تاریخ  ">{{ fa_number($favorite->fav_time) }}</td>

</tr>
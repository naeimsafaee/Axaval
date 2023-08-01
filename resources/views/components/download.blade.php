<tr class="tr">
    <td class="child1" data-column="نام عکس ">{{ $download->name }}</td>
    <td class="name child2" data-column="نام عکاس ">{{ $download->seller->name }}</td>
    <td class="date child3" data-column="تاریخ خرید ">{{ $download->buy_time }}</td>
    <td class="child4" data-column="دانلود">
        <div class="download">
            <img src="client/assets//icons/download.svg">
        </div>
    </td>
</tr>
<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Setting;

class SettingsTableSeeder extends Seeder{


    public function run(){
        $setting = $this->findSetting('site.title');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.title'),
                'value' => __('voyager::seeders.settings.site.title'),
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.description');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.description'),
                'value' => __('voyager::seeders.settings.site.description'),
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.logo');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.logo'),
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 3,
                'group' => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('site.google_analytics_tracking_id');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.site.google_analytics_tracking_id'),
                'value' => '',
                'details' => '',
                'type' => 'text',
                'order' => 4,
                'group' => 'Site',
            ])->save();
        }

        $setting = $this->findSetting('admin.bg_image');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.background_image'),
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 5,
                'group' => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.title');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.title'),
                'value' => 'Voyager',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.emergency_calls');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.emergency_calls'),
                'value' => '09099019898',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.messaging_credit');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.messaging_credit'),
                'value' => '10',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.description');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.description'),
                'value' => __('voyager::seeders.settings.admin.description_value'),
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.loader');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.loader'),
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 3,
                'group' => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.icon_image');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.icon_image'),
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 4,
                'group' => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('admin.google_analytics_client_id');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => __('voyager::seeders.settings.admin.google_analytics_client_id'),
                'value' => '',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ])->save();
        }

        $setting = $this->findSetting('page.404');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => 'توضیحات صفحه چیزی پیدا نشد',
                'value' => 'متاسفانه در این دسته و آرشیو نوشته ای درج نشده است ممکن است نوشته ها به سطل زباله منتقل شده باشند ممکن است شما دسترسی لازم را برای این بخش نداشته باشید ممکن است تاریخ انقضای مطالب این بخش سر رسیده باشد از جستجوی سایت استفاده کنید',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Page',
            ])->save();
        }

        $setting = $this->findSetting('cart.gate_description');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => 'توضیحات درگاه پرداخت',
                'value' => 'میبندنسب یب نمیب نمیمن یبسنکمیکمیبس کمیبسکم یبس کم',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Page',
            ])->save();
        }

        $setting = $this->findSetting('page.pricing_title');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => 'عنوان صفحه وبلاگ',
                'value' => 'عنوان صفحه',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Page',
            ])->save();
        }

        $setting = $this->findSetting('page.pricing_content');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => 'عنوان صفحه',
                'value' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Page',
            ])->save();
        }

        $setting = $this->findSetting('page.blog_content');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => 'محتوای صفحه وبلاگ',
                'value' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Page',
            ])->save();
        }

        $setting = $this->findSetting('page.blog_title');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => 'عنوان صفحه وبلاگ',
                'value' => 'عنوان صفحه',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Page',
            ])->save();
        }

        $setting = $this->findSetting('social.instagram');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => 'آدرس اینستاگرام',
                'value' => 'آدرس اینستاگرام',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'social',
            ])->save();
        }

        $setting = $this->findSetting('social.youtube');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => 'آدرس یوتیوب',
                'value' => 'آدرس یوتیوب',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'social',
            ])->save();
        }

        $setting = $this->findSetting('social.tweeter');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => 'آدرس توییتر',
                'value' => 'آدرس توییتر',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'social',
            ])->save();
        }

        $setting = $this->findSetting('social.facebook');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => 'آدرس فیس بوک',
                'value' => 'آدرس فیس بوک',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'social',
            ])->save();
        }

        $setting = $this->findSetting('page.faq_content');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => 'محتوای صفحه پرسش و پاسخ',
                'value' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Page',
            ])->save();
        }

        $setting = $this->findSetting('page.faq_title');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => 'عنوان صفحه پرسش و پاسخ',
                'value' => 'عنوان صفحه',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Page',
            ])->save();
        }

        $setting = $this->findSetting('page.sup_title');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => 'عنوان صفحه پشتیبانی',
                'value' => '
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                    است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Page',
            ])->save();
        }

        $setting = $this->findSetting('watermark');
        if(!$setting->exists){
            $setting->fill([
                'display_name' => 'تصویر واترمارک',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 1,
                'group' => 'Site',
            ])->save();
        }

    }

    /**
     * [setting description].
     * @param   [type] $key [description]
     * @return  [type] [description]
     * ]*/
    protected function findSetting($key){
        return Setting::firstOrNew(['key' => $key]);
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageSeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_seo', function (Blueprint $table) {
            $table->increments('id');

            /* Page General Configuration */
            $table->string('page_url')->nullable();
            $table->string('page_title')->nullable();
            $table->text('page_description')->nullable();
            $table->text('page_keywords')->nullable();
            $table->string('page_logo')->nullable();
            $table->string('page_google_robots')->nullable();

            /* Page Favicon Options */
            $table->string('page_apple_touch_icon')->nullable();
            $table->string('page_favicon_32_32')->nullable();
            $table->string('page_favicon_16_16')->nullable();
            $table->string('page_safari_mask_icon')->nullable();
            $table->string('page_safari_mask_icon_color')->nullable();
            $table->string('page_theme_color_hex')->nullable();
            $table->string('page_manifest_file')->nullable();
            $table->string('page_manifest_image_192_192')->nullable();
            $table->string('page_manifest_image_384_384')->nullable();

            $table->string('page_browserconfig_file')->nullable();
            $table->string('page_mstile_image_150_150')->nullable();

            /* Page SEO Options */
            $table->string('page_canonical_url')->nullable();
            $table->string('page_alternate_url')->nullable();

            /* Page OG SEO Options */
            $table->string('page_og_type')->nullable();
            $table->string('page_og_logo_url')->nullable();

            /* Page Google Analytics Options */
            //$table->string('page_google_analytics_code');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_seo');
    }
}

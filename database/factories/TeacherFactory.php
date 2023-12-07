<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $environment = $this->faker->randomElement(['1', '2']);
        return [
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(25, 50),
            'experience' => $this->faker->randomElement(['+1 years', '+2 years', '+3 years', '+4 years']),
            'description' => $this->faker->paragraph,
            'description_mm' => 'သဘာဝပတ်ဝန်းကျင် သို့မဟုတ် သဘာဝလောကသည် သဘာဝအတိုင်းဖြစ်ပေါ်နေသည့် သက်ရှိများနှင့် သက်ရှိ-မဟုတ်သည်များ အားလုံးအပါအဝင် အရာခပ်သိမ်းအပေါ် လွှမ်းခြုံထားသည့် လူသားများ ဖန်တီးပြုလုပ်ထားခြင်း-မဟုတ်သော အရာများကို ခေါ်ဆိုခြင်းဖြစ်သည်။ ဤဝေါဟာရအား ကမ္ဘာမြေ သို့မဟုတ် ကမ္ဘာမြေ၏ အချို့သောအစိတ်အပိုင်းများအပေါ် ရည်ညွှန်းသုံးနှုန်းလေ့ရှိသည်။ ထိုပတ်ဝန်းကျင်သည် သက်ရှိမျိုးစိတ်များ၊ ရာသီဥတု၊ မိုးလေဝသ နှင့် သဘာဝရင်းမြစ်များ စသည့်အရာအားလုံးတို့၏ အပြန်အလှန် အကျိုးသက်ရောက်မှုအပေါ် လွှမ်းခြုံနေပြီး လူသားတို့၏ ရှင်သန်ရေးနှင့် စီးပွားရေးလုပ်ငန်းများအပေါ်သို့လည်း သက်ရောက်မှုရှိလေသည်။',
            'time_table_1' => $this->faker->randomElement(['Mon,Tue,Wed ( 8:00 - 9:00 pm )', 'Sat,Sun ( 12:00 - 1:00 pm )']),
            'time_table_2' => $this->faker->randomElement(['Thu,Fri ( 8:00 - 9:00 pm )', 'Sat,Sun ( 12:00 - 1:00 pm )']),
            'time_table_1_mm' => $this->faker->randomElement(['တနင်္လာ၊ အင်္ဂါ၊ ဗုဒ္ဓဟူး ( 8:00 - 9:00 pm )', 'စနေ၊တနင်္ဂနွေ ( 12:00 - 1:00 pm )']),
            'time_table_2_mm' => $this->faker->randomElement(['ကြာသပတေး၊သောကြာ ( 8:00 - 9:00 pm )', 'စနေ၊တနင်္ဂနွေ ( 12:00 - 1:00 pm )']),
            'online_or_local' => $this->faker->randomElement(['1', '2']),
            'environment' => $environment,
            'environment_mm' => $environment
        ];
    }
}

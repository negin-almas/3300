<?php
function city2fa($code)
{
    $code = strtolower($code);
    switch ($code) {
        case "kish":
            $city = "جزیره کیش";
            break;
        case "tehran":
            $city = "تهران";
            break;
        case "abadan":
            $city = "آبادان";
            break;
        case "ahwaz":
            $city = "اهواز";
            break;
        case "arak":
            $city = "اراک";
            break;
        case "azar shahr":
            $city = "آذر شهر";
            break;
        case "babulsar":
            $city = "بابلسر";
            break;
        case "bandarabbass":
            $city = "بندرعباس";
            break;
        case "birjand":
            $city = "بيرجند";
            break;
        case "esfahan":
            $city = "اصفهان";
            break;
        case "eslamshahr":
            $city = "اسلامشهر";
            break;
        case "kanavis":
            $city = "کناويس";
            break;
        case "karaj":
            $city = "کرج";
            break;
        case "kerman":
            $city = "کرمان";
            break;
        case "kermanshah":
            $city = "کرمانشاه";
            break;
        case "khoy":
            $city = "خوي";
            break;
        case "marv dasht":
            $city = "مرو دشت";
            break;
        case "mashhad":
            $city = "مشهد مقدس";
            break;
        case "mehriz":
            $city = "مهريز";
            break;
        case "najafabad":
            $city = "نجف آباد";
            break;
        case "orumieh":
            $city = "اروميه";
            break;
        case "osku":
            $city = "اسکو";
            break;
        case "persepolis":
            $city = "پرسپوليس";
            break;
        case "qomsheh":
            $city = "قمشه";
            break;
        case "ramsar":
            $city = "رامسر";
            break;
        case "rey":
            $city = "ري";
            break;
        case "sabzevar":
            $city = "سبزوار";
            break;
        case "shiraz":
            $city = "شيراز";
            break;
        case "tabriz":
            $city = "تبريز";
            break;
        case "taft":
            $city = "تفت";
            break;
        case "torbat-heydarieh":
            $city = "تربت حيدريه";
            break;
        case "yazd":
            $city = "يزد";
            break;
        case "zahedan":
            $city = "زاهدان";
            break;
        case "zanjan":
            $city = "زنجان";
            break;
        case "zargan":
            $city = "زرگان";
            break;
        case "masheh":
            $city = "كيش";
            break;
        //-----------
        default:
            $city = $code;
    }
    return $city;
}

//---------------------------------------------
function week2fa($code)
{
    $condition = "خطا در روز هفته";
    $code = strtolower($code);
    switch ($code) {
        case "sat":
            $condition = "شنبه";
            break;
        case "sun":
            $condition = "يكشنبه";
            break;
        case "mon":
            $condition = "دوشنبه";
            break;
        case "tue":
            $condition = "سه شنبه";
            break;
        case "wed":
            $condition = "چها شنبه";
            break;
        case "thu":
            $condition = "پنج شنبه";
            break;
        case "fri":
            $condition = "جمعه";
            break;
        default:
            $condition = $code;
    }
    return $condition;
}

//---------------------------------------------
function actcode2fa($code)
{
    switch ($code) {
        case 0:
            $condition = "گردباد";
            break;

        case 1:
            $condition = "طوفان گرمسيري";
            break;

        case 2:
            $condition = "طوفان";
            break;

        case 3:
            $condition = "رعد و برق شدید";
            break;

        case 4:
            $condition = "رعد و برق";
            break;

        case 5:
            $condition = "باران توام با برف";
            break;

        case 6:
            $condition = "باران توام با بوران";
            break;

        case 7:
            $condition = "برف و بوران";
            break;

        case 8:
            $condition = "نم نم باران سرد";
            break;

        case 9:
            $condition = "نم نم باران";
            break;

        case 10:
            $condition = "باران سرد";
            break;

        case 11:
            $condition = "رگبار";
            break;

        case 12:
            $condition = "رگبار";
            break;

        case 13:
            $condition = "بارش برف نا گهانی";
            break;

        case 14:
            $condition = "رگبار و برف آرام";
            break;

        case 15:
            $condition = "بارش برف درشت";
            break;

        case 16:
            $condition = "بارش برف";
            break;

        case 17:
            $condition = "تگرگ";
            break;

        case 18:
            $condition = "بوران";
            break;

        case 19:
            $condition = "گرد و خاک";
            break;

        case 20:
            $condition = "مه آلود";
            break;

        case 21:
            $condition = "مه کم";
            break;

        case 22:
            $condition = "دود گرفته";
            break;

        case 23:
            $condition = "باد شدید";
            break;

        case 24:
            $condition = "وزش باد";
            break;

        case 25:
            $condition = "سرد";
            break;

        case 26:
            $condition = "ابري";
            break;

        case 27:
            $condition = "شب بیشتر ابری";
            break;

        case 28:
            $condition = "صبح بیشتر ابری";
            break;

        case 29:
            $condition = "شب تا قسمتی ابری";
            break;

        case 30:
            $condition = "صبح تا قسمتی ابری";
            break;

        case 31:
            $condition = "شب صاف";
            break;

        case 32:
            $condition = "آفتابي";
            break;

        case 33:
            $condition = "شب نسبتا خوب";
            break;

        case 34:
            $condition = "صبح نسبتا خوب";
            break;

        case 35:
            $condition = "باران توام با تگرگ";
            break;

        case 36:
            $condition = "بسیار گرم";
            break;

        case 37:
            $condition = "رعد و برق عایق";
            break;

        case 38:
            $condition = "رعد و برق پراکنده";
            break;

        case 39:
            $condition = "رعد و برق پراکنده";
            break;

        case 40:
            $condition = "رگبار پراکنده";
            break;

        case 41:
            $condition = "برف سنگين";
            break;

        case 42:
            $condition = "بارش برف پراکنده";
            break;

        case 43:
            $condition = "برف سنگین";
            break;

        case 44:
            $condition = "تا قسمتی ابری";
            break;

        case 45:
            $condition = "رگبار همراه رعد و برق";
            break;

        case 46:
            $condition = "رگبار همراه برف";
            break;

        case 47:
            $condition = "رگبار همراه رعد و برق";
            break;

        case 3200:
            $condition = "اطلاعي در دست نيست";
            break;
    }
    return $condition;
}

?>
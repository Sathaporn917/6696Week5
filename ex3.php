<!DOCTYPE html>
<html lang="en">
<head>
<!-- ใช้ Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

<style>
  body {
    font-family: "Mitr", serif;
    margin: 50px auto;
    max-width: 800px;
  }
</style>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>โปรแกรมคำนวณ BMI</title>
</head>
<body>
<h1 class="text-center">โปรแกรมคำนวณ BMI</h1>     
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <div class="row mb-3">
    <label class="col-sm-2">น้ำหนัก</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="weight" placeholder="กรอกน้ำหนัก (kg)">
    </div>
    <label class="col-sm-2">kg</label>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2">ส่วนสูง</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="height" placeholder="กรอกส่วนสูง (cm)">
    </div>
    <label class="col-sm-2">cm</label>
  </div>
  <button type="submit" class="btn btn-primary">คำนวณค่า BMI</button>
  <button type="reset" class="btn btn-danger">ยกเลิก</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = $_POST["weight"];
    $height = $_POST["height"];

    if (is_numeric($weight) && is_numeric($height) && $height > 0) {
        // แปลงส่วนสูงจาก cm เป็น m
        $height_m = $height / 100;

        // คำนวณ BMI
        $bmi = $weight / ($height_m * $height_m);

        echo "<br><h3>ค่า BMI ของคุณคือ: " . number_format($bmi, 2) . "</h3>";

        // เงื่อนไขแสดงสถานะสุขภาพ
        if ($bmi < 18.50) {
            echo "<h4 class='text-warning'>BMI น้อยกว่า 18.50 <br><br> น้ำหนักน้อยกว่ามาตรฐาน
คุณมีน้ำหนักน้อยหรือผอม โดยทั่วไป ค่าดัชนีมวลกายปกติมีค่าน้อยกว่า 18.50

ข้อแนะนำ
<br>
1. กรณีกินเยอะแต่ไม่อ้วน ก็ต้องระวังเรื่องคุณภาพของอาหารที่กินเข้าไปด้วย เลือกกินอาหารที่ดี มีประโยชน์ ลดหวาน มัน เค็ม และหลีกเลี่ยงอาหารที่มีไขมันสูง เพราะอาจเพิ่มความเสี่ยงต่อการเป็นโรคเบาหวาน ความดันเลือดสูง ไขมันในเลือดสูง หรือผอมลงพุงได้ <br>
<br>
2. เลือกกินอาหารให้หลากหลายครบ 5 หมู่ โดยเน้นอาหารที่มีโปรตีน เพื่อช่วยในการเสริมสร้างกล้ามเนื้อ หากต้องการเพิ่มน้ำหนัก ให้ไม่ผอมจนเกินไป ให้เพิ่มปริมาณการกินอาหารประมาณ 300-500 กิโลแคลอรี โดยเน้นการกินอาหารที่มีประโยชน์ คาร์โบไฮเดรตเชิงซ้อน และไขมันดี <br>
<br>
3. เคลื่อนไหว และออกกำลังกายสม่ำเสมอ ระดับความหนักปานกลาง โดยเลือกกิจกรรมการออกกำลังกายที่ชื่นชอบและสนุกสนาน เพื่อส่งเสริมให้อยากออกกำลังกาย ลดความเบื่อหน่าย เช่น การเต้นเข้าจังหวะ เดิน วิ่ง ว่ายน้ำ หรือกิจกรรมออกแรง ขยับร่างกายในชีวิตประจำวัน อย่างการทำงานบ้าน การทำสวน เป็นต้น แนะนำให้ออกกำลังกาย อย่างน้อยวันละ 30 นาที หรือ ไม่น้อยกว่า 150 นาทีต่อสัปดาห์ (Underweight)</h4><br>";
        } elseif ($bmi < 18.50 - 22.90) {
            echo "<h4 class='text-success'>BMI ระหว่าง 18.50 - 22.90
<br>
น้ำหนักปกติ
คุณมีน้ำหนักอยู่ในเกณฑ์มาตรฐาน ค่าดัชนีมวลกายมีค่าระหว่าง 18.50 - 22.90
<br>
ข้อแนะนำ
1. เลือกกินอาหารให้ได้สัดส่วนพอเหมาะ และเลือกอาหารที่ดี มีประโยชน์ ครบ 5 หมู่ กำหนดปริมาณอาหารให้เพียงพอต่อความต้องการ การใช้พลังงานของร่างกาย อาหารกลุ่มคาร์โบไฮเดรตให้เลือกเป็น ข้าว-แป้งขัดสีน้อย ธัญพืช ไม่น้อยกว่า 6 ทัพพี กินผักหลากหลาย ถั่ว ผลไม้อ่อนหวาน รวมกันไม่น้อยกว่า 400 กรัมต่อวัน เพื่อให้ได้รับสารอาหาร วิตามิน เกลือแร่อย่างเพียงพอ เกิดความสมดุลด้านโภชนาการ และมีส่วนช่วยให้รักษา และควบคุมน้ำหนักให้อยู่ในเกณฑ์ได้
<br>
2. ออกกำลังกาย หรือเคลื่อนไหวร่างกายสม่ำเสมอ เลือกความเข้มข้นของกิจกรรมการออกกำลังกาย ที่ระดับปานกลาง หรือ ใช้ชีวิตให้กระฉับกระเฉง ลุกเดิน เคลื่อนไหวร่างกายบ่อยๆ หากรักในการออกกำลังกาย ควรเลือกกิจกรรมที่ชื่นชอบและสนุกสนาน จะช่วยลดความเบื่อหน่าย ทำได้บ่อย และสม่ำเสมอมากขึ้น นอกจากนี้การออกกำลังกาย มีส่วนช่วยให้สุขภาพร่างกายแข็งแรง สมบูรณ์ กล้ามเนื้อแข็งแรง มีส่วนช่วยลดความเสี่ยงในการเกิดโรคไม่ติดต่อเรื้อรัง(NCDs) ต่างๆ ได้ ถ้าหากต้องการให้สมรรถภาพร่างกายดีขึ้น ควรเลือกการออกกำลังกายแบบแอโรบิค เช่น เดินเร็วๆ วิ่งเหยาะ ถีบจักรยานเร็วๆ กระโดดเชือก ว่ายน้ำ หรือเล่นกีฬา โดยทำสม่ำเสมอวันละ 20 - 30 นาที อย่างน้อย 3 - 4 วัน / สัปดาห์ (Normal weight)</h4>";
        } elseif ($bmi < 23 - 24.90) {
            echo "<h4 class='text-warning'>BMI ระหว่าง 23 - 24.90<br><br>

ท้วม / อ้วนระดับ 1
ถ้าคุณไม่ใช่คนออกกำลังกาย คุณเริ่มมีน้ำหนักเกินมาตรฐาน หรือมีรูปร่างท้วม ค่าดัชนีมวลกายมีค่าระหว่าง 23 - 24.90
<br>
ข้อแนะนำ
1. ต้องเริ่มควบคุม และเลือกกินอาหารให้เหมาะสม ปรับเปลี่ยนพฤติกรรมการกินอาหาร โดยเน้นเลือกกินอาหารที่ดีมีประโยชน์ ครบ 5 หมู่ กำหนดปริมาณตามความต้องการพลังงานของร่างกาย หรือลดจากเดิมเล็กน้อย ประมาณ 200-300 กิโลแคลอรี โดยค่าปริมาณพลังงานจากอาหารที่กินในแต่ละวันเฉลี่ยไม่ควรน้อยกว่า 1,000 - 1,200 กิโลแคลอรี หรือไม่น้อยกว่าค่า BMR ของแต่ละคน เพื่อป้องกันการจำกัดอาหารมากจนเกินไป ที่อาจส่งผลให้ร่างกายได้รับสารอาหารไม่เพียงพอ
<br>
ใส่ใจเรื่องโภชนาการให้มากขึ้น ลดอาหารหวาน มัน และเค็มจัด โดยเฉพาะ อาหาร ขนม ของหวาน เครื่องดื่มที่มีน้ำตาล และเครื่องดื่มที่มีแอลกอฮอล์ อาหารแปรรูปต่างๆ กินอาหารให้หลากหลายในสัดส่วนที่เหมาะสม เลือกกินข้าว - แป้ง ขัดสีน้อย ธัญพืชต่างๆ และกินผัก - ผลไม้อย่างน้อย 400 กรัม / วัน ไม่อด ไม่งดอาหารมากจนเกินไป เพื่อให้สามารถควบคุมอาหารได้ดีมากยิ่งขึ้น
<br>
2. เคลื่อนไหว และออกกำลังกายแบบแอโรบิคอย่างสม่ำเสมอ เลือกความเข้มข้นปานกลาง โดยทำอย่างน้อยวันละ 30 - 40 นาที 4 - 5 วัน/สัปดาห์ สำหรับคนที่ไม่เคยออกกำลังกาย ควรเริ่มด้วยกิจกรรมเบาๆ เช่นการเดิน หรือ วิ่งจ๊อกกิ้ง ปั่นจักรยาน ทำต่อเนื่อง เพื่อให้ร่างกายเกิดความคุ้นเคย และพัฒนาความแข็งแรงขึ้น แล้วจึงค่อยๆ เพิ่มความเข้มข้นของกิจกรรมขึ้นทีละน้อย
<br>
3. เสริมการฝึกเวทเทรนนิ่ง เพื่อเพิ่มความแข็งแรง และปริมาณของกล้ามเนื้อ ที่มีส่วนช่วยในการเผาผลาญพลังงาน และทำให้ไขมันลดลง สำหรับผู้ที่ไม่เคยฝึกการออกกำลังกายแบบใช้แรงต้าน หรือ เวทเทรนนิ่ง อาจเริ่มต้นด้วยกิจกรรมแบบบอดี้เวทง่ายๆ โดยใช้แรงต้านจากน้ำหนักตัวเอง เช่นการทำท่า แพลงกิ้ง สควอช หรือซิทอัพ ก็ได้ หรือหากต้องการใช้ลูกน้ำหนัก หรืออุปกรณ์เสริมแรงต้าน ก็ควรศึกษาหาข้อมูล หรือรับคำแนะนำจากผู้เชี่ยวชาญ ก่อนลงมือปฏิบัติ เพื่อป้องกันอุบัติเหตุ หรืออันตรายที่อาจเกิดขึ้นจากการออกกำลังกายผิดวิธี (Overweight)</h4>";
        }elseif ($bmi < 25 - 29.90) {
                echo "<h4 class='text-success'>BMI ระหว่าง 25 - 29.90
    <br><br>
   อ้วน / อ้วนระดับ 2
ถ้าคุณไม่ใช่คนออกกำลังกาย คุณเข้าเกณฑ์อ้วนแล้ว (อ้วนระดับ 2) ค่าดัชนีมวลกายมีค่าระหว่าง 25 - 29.90
<br>
ข้อแนะนำ
1. การควบคุมอาหารมีส่วนสำคัญอย่างมาก ที่จะช่วยให้สามารถลดน้ำหนักให้อยู่ในเกณฑ์ปกติได้ ควรปรับเปลี่ยนพฤติกรรมการกินอาหาร โดยเลือกกินอาหารให้หลากกลาย แต่มีประโยชน์ กำหนดปริมาณการกินที่เหมาะสม ต่อความต้องการพลังงาน ไม่ลด ไม่งด หรือ อดอาหารมากจนเกินไป ลดพลังงานจากอาหารในแต่ละวันเล็กน้อย ประมาณ 200 - 300 กิโลแคลอรี โดยค่าปริมาณพลังงานจากอาหารที่กินในแต่ละวันเฉลี่ยไม่ควรน้อยกว่า 1,000 - 1,200 กิโลแคลอรี หรือไม่น้อยกว่าค่า BMR ของแต่ละคน ลด หรือหลีกเลี่ยงการกินอาหารที่มีน้ำตาลสูง ขนมหวาน , เครื่องดื่มที่มีรสหวาน ของทอด อาหารแปรรูป อาหารที่มีไขมันอิ่มตัวสูง และควรควบคุมอาหารที่มีปริมาณโซเดียมสูงด้วย
<br>
เลือกกินอาหารโดยเน้นที่โภชนาการครบถ้วน เพื่อให้ร่างกายได้สารอาหาร และวิตามินที่มีประโยชน์ เช่น ข้าว - แป้งขัดสีน้อย ธัญพืช ถั่ว เนื้อสัตว์ไขมันต่ำ อกไก่ ไข่ และเนื้อปลา กินผักและผลไม้อ่อนหวาน ในสัดส่วนที่พอเหมาะ หรืออย่างน้อย 400 กรัมต่อคนต่อวัน
<br>
2. คนที่มีน้ำหนักตัวมาก ก่อนจะเริ่มออกกำลังกาย ควรปรึกษา หรือรับคำแนะนำจากแพทย์ หรือผู้เชี่ยวชาญ เพื่อประเมินสมรรถภาพร่างกายเสียก่อน เพื่อป้องกันอันตรายที่อาจเกิดขึ้น จากปัญหาสุขภาพ และร่างกายที่ไม่พร้อม
<br>
กิจกรรมการออกกำลังกายที่เหมาะกับคนอ้วน หรือคนที่มีน้ำหนักตัวมาก ควรเริ่มที่กิจกรรมที่ไม่หนักมาก ทำได้ง่าย เน้นที่ความหนักปานกลาง เช่นการเดิน หรือการเดินในน้ำ ที่มีส่วนช่วยลดความเสี่ยงต่ออาการบาดเจ็บ จากการออกกำลังกายได้ พยายามออกกำลังกายให้ได้สม่ำเสมอ ประมาณ 40 - 60 นาที / วัน หรือ ในระยะเริ่มต้น อาจใช้เวลาน้อยแต่มากครั้งการออกกำลังกาย โดยทำครั้งละ 10 - 20 นาที 2 - 3 ครั้งต่อวัน เมื่อน้ำหนักตัวลดลด ร่างกายแข็งแรงมากขึ้น จึงค่อยๆเพิ่มความเข้มข้นของกิจกรรม หรือเพิ่มเวลาให้ออกกำลังกายนานขึ้น
<br>
ใช้ชีวิตประจำวันให้กระฉับกระเฉง เคลื่อนไหวร่างกายให้มาก หรือหากิจกรรมภายในบ้าน ที่ช่วยให้ได้ขยับร่างกาย อย่างการทำงานบ้าน ทำสวน หรือลุกเดินไปมาบ่อยๆ
<br>
3. สร้างกล้ามเนื้อด้วยเวทเทรนนิ่ง การออกกำลังกายโดยใช้แรงต้าน จะช่วยเสริมสร้างปริมาณ และส่งเสริมความแข็งแรงของกล้ามเนื้อ ที่เป็นส่วนสำคัญในการเผาผลาญพลังงาน ช่วยให้การทรงตัวดีขึ้น เคลื่อนไหว และทำกิจกรรมได้สะดวก คล่องตัวขึ้น
<br>
คนที่มีน้ำหนักตัวมากๆ อยากเริ่มเวทเทรนนิ่ง ควรได้รับคำแนะนำจากผู้เชี่ยวชาญ หรือ ครูฝึกที่มีประสบการณ์ เพื่อป้องกันการบาดเจ็บ จากกการออกกำลังกายผิดวิธี และการใช้อุปกรณ์ที่ไม่ถูกต้อง ควรศึกษา และหาท่าทางที่เหมาะสมกับรูปร่าง ไม่ฝืน หรือหักโหมจนเกินไป ทำอย่างสม่ำเสมอ ค่อยเป็นค่อยไป เมื่อกล้ามเนื้อแข็งแรงมากขึ้น ทรงตัวได้ดีขึ้น จึงค่อยปรับความเข้มข้นของกิจกรรม ท่าทางและน้ำหนักของแรงต้าน ตามความสามารถของร่างกาย(Normal weight)</h4>";
        }elseif ($bmi < 30) {
    echo "<h4 class='text-success'>BMI ระหว่าง 30
<br><br>

อ้วนมาก / อ้วนระดับ 3
แย่แล้ว!! ถ้าคุณไม่ใช้คนออกกำลังกาย หรือนักเพาะกาย คุณอ้วนมากแล้ว (อ้วนระดับ 3) ค่าดัชนีมวลกายมีค่ามากกว่า 30
<br>
ข้อแนะนำ
เพื่อสุขภาพที่ดีขึ้น คุณต้องปรับเปลี่ยนพฤติกรรมแล้ว ถ้าอยากเปลี่ยนตัวเองให้กลับมามีรูปร่างสมส่วน โรคร้ายไม่ถามหา ต้องเริ่มใส่ใจเรื่องโภชนาการ และออกกำลังกายแล้ว โภชนาการมีส่วนสำคัญ ที่จะช่วยให้ลด และควบคุมน้ำหนักได้ดีขึ้น สำหรับคนที่คิดว่าตัวเองกินน้อย กินอาหารปกติแต่ยัง อ้วนมากๆ ควรเข้ารับคำปรึกษาจากแพทย์ เพื่อรับรักษาภาวะโรคอ้วน หรือถ้าอ้วนจากความเผลอเลอ กินดุ กินเก่ง ต้องควบคุมการกินอาหารให้ดี เลือกกินอาหารที่ดีมีประโยชน์ต่อร่างกาย ในปริมาณที่เหมาะสม ไม่งด ไม่อดอาหารมากจนเกินไป เพราะจะทำให้โหย หิวบ่อย และยอมแพ้ไปก่อน อาจลดปริมาณอาหารที่กินในแต่ละวันเล็กน้อยประมาณ 200 - 300 กิโลแคลอรี โดยค่าปริมาณพลังงานจากอาหารที่กินในแต่ละวันเฉลี่ยไม่ควรน้อยกว่า 1,000 - 1,200 กิโลแคลอรี หรือต้องไม่น้อยกว่าค่า BMR ของแต่ละคน
<br>
เลือกกินให้มากๆ ลดอาหารหวาน ของหวาน ขนม เครื่องดื่มที่มีน้ำตาล งด หรือหลีกเลี่ยงของทอด อาหารไขมันสูง อาหารที่มีไขมันอิ่มตัวสูง อาหารแปรรูป เบเกอรี่ ขนมซองต่างๆ และเครื่องดื่มที่มีแอลกอฮอล์ อาหารเค็มจัด โซเดียมสูง
<br>
<br>
ไม่กินอาหารตามใจ ไม่กินอาหารแก้เครียด ไม่กินจุบจิบ พยายามเลือกกินอาหารที่มีประโยชน์ ผัก - ผลไม้อ่อนหวาน เลือกข้าว - แป้งที่ขัดสีน้อย ธัญพืช เมล็ดพืช ถั่ว สำหรับเนื้อสัตว์ เลือกเนื้อสัตว์ส่วนที่มีไขมันต่ำ เนื้อส่วนอก ไข่ไก่ หรือ เนื้อสัตว์ที่ให้ไขมันดีอย่างเนื้อปลา เป็นต้น
<br>
2. ควรหมั่นเคลื่อนไหวร่างกาย ทำกิจวัตรประจำวันให้กระฉับกระเฉง ลุกขึ้นยืน เดินให้มาก และหากิจกรรมที่ช่วยให้ได้ขยับร่างกายมากขึ้น หากต้องการที่จะเริ่มการออกกำลังกาย ควรเข้ารับคำแนะนำจากแพทย์ หรือผู้เชี่ยวชาญ เพื่อประเมินความพร้อมด้านสุขภาพ และร่างกาย เสียก่อน
<br>
เริ่มต้นออกกำลังกายด้วยกิจกรรมเบาๆ เหมาะสมกับสภาพร่างกาย โดยค่อยทำทีละน้อย แต่ทำอย่างสม่ำเสมอ เมื่อร่างกายแข็งแรงขึ้น จึงค่อยๆ ปรับโปรแกรมการออกกำลังกายให้เข้มข้นมากขึ้น หรือ ใช้เวลาการออกกำลังกายให้นานขึ้น เลือกกิจกรรมการออกกำลังกายที่ปะทะน้อย แรงกระแทกต่ำ อย่างการเดิน การเดินในน้ำ ยืนแกว่งแขน หรือกิจกรรมที่ไม่หักโหมจนเกินไป โดยพยายามตั้งเป้าหมายการออกกำลังกายให้ได้ 40 - 60 นาทีต่อวัน หรือจะแบ่งเป็นช่วงสั้นๆ ครั้งละ 10 - 20 นาที 2 - 3 ครั้งต่อวัน ก็ได้
<br>
3. ควรฝึกความแข็งแรงของกล้ามเนื้อด้วยกิจกรรมเวทเทรนนิ่ง ที่ควบคุมโดยผู้เชี่ยวชาญ จะช่วยให้การฝึกปลอดภัย ถูกต้องและเหมาะสม เพื่อลดความเสี่ยงในการเกิดอุบัติเหตุ และอาการบาดเจ็บได้ การฝึกควรทำอย่างค่อยเป็นค่อยไป ตามความแข็งแรงของร่างกาย ไม่ฝืน ไม่หักโหม และเมื่อน้ำหนักตัวลดลง กล้ามเนื้อ ร่างกายแข็งแรงขึ้น จึงค่อยปรับเปลี่ยนโปรแกรมการฝึก ให้เข้มข้น หรือใช้เวลาในการออกกำลังกายมากขึ้น(Normal weight)</h4>";
    } else {
        echo "<div class='alert alert-danger'>กรุณากรอกข้อมูลให้ถูกต้อง!</div>";
    }
}
}
?>
<h1>จัดทำโดย</h1>
<h2>นายสถาพร  ทิพย์ไปรยา 664485025 66/96</h2>

</body>
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
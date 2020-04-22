<?php 
    require_once('connect.php'); // เรียกไฟล์เชื่อมต่อ Database เข้ามาใช้งานเพียงครั้งเดียว
    // ประกาศตัวแปร เพื่อเก็บค่า //
    $id = $_GET['id'];
    /** 
     * isset หมายความว่า ตัวแปรนั้นๆ มีการกำหนดขึ้นมาหรือไม่
     * ใช้สำหรับ check เงื่อนไขของตัวแปร
     */
    if (isset($id)){
        /**
         * ประกาศตัวแปร $sql เพื่อเก็บคำสั่ง sql
         * ลบข้อมูลที่มีตารางชื่อว่า fruits โดยมีเงื่อนไขที่ว่า id ต้องเท่ากับ $id
         */
        $sql = "DELETE FROM `fruits` WHERE `id` =  '".$id."' ";
        // ประมวณผล query ($conn->query($sql))
        $result = $conn->query($sql);
        
        // ตรวจสอบการประมวลผลด้วยคำสั่ง affected_rows ที่ถูกประมวลผลว่ามีการเปลี่ยนแปลงหรือไม่
        if($conn->affected_rows){
            echo "สำเร็จ";
        } else {
            echo "ไม่มีข้อมูลให้ Delete";
        }

    } else {
        echo "ไม่มี ID";
    }

    /**
     * ความรู้: ตรวจสอบการประมวลผลด้วยคำสั่ง affected_rows บน PHP
     * 1. ผลลัพธ์ที่ส่งมาจากคำสั่ง affected_rows คือ จำนวน rows ที่ถูกประมวลผล หรือมีการเปลี่ยนแปลง
     * 2. นิยมใช้งานร่วมกับคำสั่งเงื่อนไข if else เพื่อแสดงข้อความสถานะการทำงาน
     */
?>
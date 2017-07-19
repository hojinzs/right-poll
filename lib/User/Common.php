<?php

namespace User;

/**
 * 유저 정보의 조회 / 컨트롤 관련 클래스
 */
class Common
{

    /**
     * 존재하는 USER ID인지 확인
     * @param var $user_id 유저 아이디
     * @return bool true=있음/false=없음
     */
    public static function getCurrentUserID($user_id){
        $query =
            "SELECT
                u.id
            FROM
                rightpoll.user u
            WHERE
                u.id = :id
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
        $row = $stmt->fetch();

        if($row == null){
            return false;
        } else {
            return true;
        }
    }

    /**
     * 이미 가입한 회원 중 중복된 이메일을 사용하는 회원이 있는지 조회함.
     * @param var $email 이메일 주소
     * @return bool false="조회 결과 없음",true="조회 결과 있음"
     */
    public static function getCurrentUserEmail($email){

        // DB에서 $email과 동일한 이메일을 사용하는 회원 조회
        $query =
            "SELECT
                u.id
            FROM
                rightpoll.user u
            WHERE
                u.email = :email
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch();

        if($row == null){
            return false;
        } else {
            return true;
        }
    }

    /**
     * 이미 가입한 회원 중 중복된 닉네임을 사용하는 회원이 있는지 조회 함.
     * @param var $nick 중복 체크할 닉네임
     * @return bool false="조회 결과 없음", true="조회 결과 있음"
     */
    public static function getCurrentUserNick($nick){

         // DB에서 $email과 동일한 닉네임을 사용하는 회원 조회
         $query =
             "SELECT
                 u.id
             FROM
                 rightpoll.user u
             WHERE
                 u.nick = :nick
             ";
         $stmt = \db()->prepare($query);
         $stmt->bindParam(':nick', $nick);
         $stmt->execute();
         $row = $stmt->fetch();

         if($row == null){
             return false;
         } else {
             return true;
         }
     }

     /**
      * 새로운 유저 생성
      * @param var $email 로그인에 사용할 이메일
      * @param var $nick 사용할 닉네임
      * @param var $password 로그인에 사용할 암호
      */
     public static function setNewUser($email,$nick,$password){

         // 패스워드를 SHA256으로 암호화
         $password = hash('sha256', $password);

         // DB Insert
         $query =
         "INSERT INTO rightpoll.user
         (
             email,
             nick,
             password
         )
         VALUES
         (
             :email,
             :nick,
             :password
         )
         ";
         $stmt1 = \db()->prepare($query);
         $stmt1->bindParam(':email', $email);
         $stmt1->bindParam(':nick', $nick);
         $stmt1->bindParam(':password',$password);
         $stmt1->execute();

         return "success";
     }

    /**
    * [getUserPassword description]
    * @param [type] $email [description]
    * @return [type] [description]
    */
    public static function getUserPassword($email){
        $query =
            "SELECT
                u.password
            FROM
                rightpoll.user u
            WHERE
                u.email = :email
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch();

         return $row[0];
    }

    /**
     * 이메일 정보로 유저 ID 가져오기
     * @param var $email 검색할 유저 이메일
     * @return var 유저 ID
     */
    public static function getUserId($email){
        $query =
            "SELECT
                u.id
            FROM
                rightpoll.user u
            WHERE
                u.email = :email
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch();

        return $row;
    }

    /**
    * 유저 데이터 불러오기
    * @param var $id 불러올 사용자 ID
    * @return array (email,nick)
    */
    public static function getUserInfomation($id){
        $query =
            "SELECT
                u.email,
                u.nick
            FROM
                rightpoll.user u
            WHERE
                u.id = :id
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch();

        return $row;
    }

}

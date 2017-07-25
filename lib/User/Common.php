<?php

namespace User;

/**
 * 유저 정보의 조회 / 컨트롤 관련 클래스
 */
class Common
{

    /**
     * 존재하는 USER idx(번호) 인지 확인
     * @param var $id 유저 아이디
     * @return bool true=있음/false=없음
     */
    public static function getCurrentUserIdx($id){
        $query =
            "SELECT
                u.id
            FROM
                rightpoll.user u
            WHERE
                u.id = :id
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch();

        if($row == null){
            return false;
        } else {
            return true;
        }
    }

    /**
     * 존재하는 USER user_id(로그인 아이디)인지 확인
     * @param var $user_id 유저 아이디
     * @return bool true=있음/false=없음
     */
    public static function getCurrentLoginId($user_id){
        $query =
            "SELECT
                u.id
            FROM
                rightpoll.user u
            WHERE
                u.user_id = :user_id
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
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
    * [getUserPassword description]
    * @param [type] $login_id [description]
    * @return [type] [description]
    */
    public static function getUserPassword($login_id){
        $query =
            "SELECT
                u.password
            FROM
                rightpoll.user u
            WHERE
                u.user_id = :login_id
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':login_id', $login_id);
        $stmt->execute();
        $row = $stmt->fetch();

         return $row[0];
    }

    /**
     * 로그인 ID로 유저 ID 가져오기
     * @param var $login_id 검색할 유저 이메일
     * @return var 유저 ID
     */
    public static function getUserId($login_id){
        $query =
            "SELECT
                u.id
            FROM
                rightpoll.user u
            WHERE
                u.user_id = :user_id
            ";
        $stmt = \db()->prepare($query);
        $stmt->bindParam(':user_id', $login_id);
        $stmt->execute();
        $row = $stmt->fetch();

        return $row['id'];
    }

    /**
    * 유저 데이터 불러오기
    * @param var $id 불러올 사용자 ID
    * @return array (email,nick)
    */
    public static function getUserInfomation($id){
        $query =
            "SELECT
                u.user_id,
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

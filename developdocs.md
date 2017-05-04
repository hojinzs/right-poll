# rightpoll 기획

## IA

* 첫 페이지 (index)
  * 당선자 목록 (elected-list)
  * 당선자 정보 / 공약 목록 (elected-info)
  * 공약 상세정보 (policy-info)

## DB 모델링

**당선자(Elected)**

* DB 테이블명: elected
* 선출직 공무원 당선 정보

필드명|레이블|형식
---|---|---
id|번호|int
elected-date|당선일|yyyy-mm-dd
chair|직위|text
name|이름|text
page|페이지주소|text
create-date|등록일|yyyy-mm-dd

**공약 구분(category)**

* DB 테이블명: category
* 공약 구분

필드명|레이블|형식
---|---|---
id|번호|int
name|구분명|text
description|설명|rich-text
elected-id|당선자번호|int
create-date|등록일|yyyy-mm-dd

**공약(policy)**

* DB 테이블명: policy
* 공약 상세

필드명|레이블|형식
---|---|---
id|번호|int
name|구분명|text
description|설명|rich-text
category-id|카테고리번호|int
create-date|등록일|yyyy-mm-dd

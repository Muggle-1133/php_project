# 라이브러리 import
from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.alert import Alert
from webdriver_manager.chrome import ChromeDriverManager
import time
import pyperclip
import sys

chrome_options = webdriver.ChromeOptions()

def login(id, pwd):
    driver = None
    try:
        # 드라이버 로딩
        driver = webdriver.Chrome('chromedriver.exe')
        # 사용할 변수 선언
        # yportal 로그인 url
        url = 'http://yportal.ync.ac.kr/login/Login.do'
        
        uid = id
        upw = pwd

        # yportal 로그인 페이지로 이동
        driver.get(url)
        # 로딩 대기
        time.sleep(2)

        # 아이디 입력폼
        tag_id = driver.find_element_by_id('loginId')
        tag_pw = driver.find_element_by_id('loginPw')

        # 아이디 입력

        tag_id.send_keys(uid)
        tag_pw.send_keys(upw)
        time.sleep(1)

        # 로그인 버튼 클릭
        login_btn = driver.find_element_by_id('btn-login')
        login_btn.click()
        time.sleep(2)

        print(Alert(driver).text)
    
        # yportal 개인정보 변경 페이지로 이동
        info_url = 'http://yportal.ync.ac.kr/userinfo/Userinfo.do?procType=StdV'
        driver.get(info_url)
        # 학번 변수 
        studentID = driver.find_element_by_xpath('//*[@id="scomm"]/div[1]/table/tbody/tr[1]/td[3]')
        # 학과 변수 
        studentDept = driver.find_element_by_xpath('//*[@id="scomm"]/div[1]/table/tbody/tr[2]/td[2]')
        # 이름 변수
        studentName = driver.find_element_by_xpath('//*[@id="scomm"]/div[1]/table/tbody/tr[1]/td[5]')
        
        info_list = [studentID.text, studentDept.text, studentName.text]
        for i in info_list:
            print(i)
    except:
        #alert = driver.switch_to_alert()
        #print(alert.text)
        #print(Alert(driver).text)
        #Alert(driver).accept()
        print("Except")
    finally:
        driver.close()

login(sys.argv[1], sys.argv[2])
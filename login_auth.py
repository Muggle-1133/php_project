# 라이브러리 import
from selenium import webdriver
import chromedriver_autoinstaller
import os
from selenium.webdriver.common.alert import Alert
from selenium.webdriver.common.by import By
import time
import sys


chrome_options = webdriver.ChromeOptions()
chrome_options.add_argument('headless')

def login(id, pwd):
    #driver = None
    try:
        # 크롬드라이버가 설치되어있는지 확인
        chrome_ver = chromedriver_autoinstaller.get_chrome_version().split('.')[0]
        driver_path = f'./{chrome_ver}/chromedriver.exe'
        if os.path.exists(driver_path):
            print(f"chrom driver is insatlled: {driver_path}")
        else:
            print(f"install the chrome driver(ver: {chrome_ver})")
            chromedriver_autoinstaller.install(True)
        
        # 드라이버 로딩
        driver = webdriver.Chrome(driver_path, options=chrome_options)
        
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
        tag_id = driver.find_element(By.ID,'loginId')
        tag_pw = driver.find_element(By.ID,'loginPw')

        # 아이디 입력

        tag_id.send_keys(uid)
        tag_pw.send_keys(upw)
        time.sleep(1)

        # 로그인 버튼 클릭
        login_btn = driver.find_element(By.ID,'btn-login')
        login_btn.click()
        time.sleep(2)
        try :
            print(Alert(driver).text)
            Alert(driver).accept()
            print("alert")
        except :
            print("no alert")
        
            # yportal 개인정보 변경 페이지로 이동
            info_url = 'http://yportal.ync.ac.kr/userinfo/Userinfo.do?procType=StdV'
            driver.get(info_url)

            # 학번 변수 
            studentID = driver.find_element(By.XPATH,'//*[@id="scomm"]/div[1]/table/tbody/tr[1]/td[3]')
            # 학과 변수 
            studentDept = driver.find_element(By.XPATH,'//*[@id="scomm"]/div[1]/table/tbody/tr[2]/td[2]')
            # 이름 변수
            studentName = driver.find_element(By.XPATH,'//*[@id="scomm"]/div[1]/table/tbody/tr[1]/td[5]')
            # 학적상태 변수
            studentStat = driver.find_element(By.XPATH,'//*[@id="scomm"]/div[1]/table/tbody/tr[6]/td[4]')
            # 학년 변수
            studentGrade = driver.find_element(By.XPATH,'//*[@id="scomm"]/div[1]/table/tbody/tr[3]/td[2]')

            info_list = [studentID.text, studentDept.text, studentName.text, studentStat.text, studentGrade.text]
            for i in info_list:
                print(i)
    except:
        print("Except")
    finally:
        driver.close()

login(sys.argv[1], sys.argv[2])
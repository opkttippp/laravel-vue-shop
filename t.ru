import telebot
import requests
import pickle
from telebot import types

bot = telebot.TeleBot('5546538067:AAE7xjKwREQin_yVb_zFIajThKgyd8hLqxw')
#Команды начинаются на "/"
@bot.message_handler(commands=['start'])
def start(message):
	photo = open('/python/bot2/hello.png', 'rb')
	bot.send_photo(message.chat.id, photo)
	user = f"Здравствуй <b>{message.from_user.first_name}</b>, Воспользуйтесь меню. 👇"
	bot.send_message(message.chat.id, user, parse_mode='html')
	markup = types.InlineKeyboardMarkup()
	markup.add(types.InlineKeyboardButton("Заказать чат-бота через сайт", url='https://kwork.ru/user/michaeltkchnk'))
	bot.send_message(message.chat.id, 'Сайт', reply_markup=markup)
	bot.send_message(message.chat.id, 'Для выбора услуги, напишите:\n1 - Заказать чат-бота \n2 - Как связаться ❓ \n3 - Хочу денег ❗️❗️❗️', parse_mode='html')
	#Данные пользователя 👇
	name1 = {message.from_user.first_name}
	name2 = {message.from_user.last_name}
	ID = {message.from_user.id}
	new_user = {}
	new_user['Имя'] = name1
	new_user['Фамилия'] = name2
	new_user['Айди'] = ID
	print(new_user)

@bot.message_handler(commands=['Chat_bot'])
def inf_step(message):
	msg = bot.send_message(message.chat.id, 'Опишите для чего нужен вам нужен чат-бот, и какие функции он должен выполнять?')
	global inf
	inf = message.text
	bot.register_next_step_handler(msg, time_step)
	#Степы ето команды которые будут выполнятся после команды "main"
	# _step можно менять

def time_step(message):
	msg = bot.send_message(message.chat.id, 'Какое желаемое время на создание чат-бота?')
	time = message.text
	bot.register_next_step_handler(msg, money_step)

def money_step(message):
	msg = bot.send_message(message.chat.id, 'Какой у вас бюджет на чат-бот?')
	money = '123'
	bot.register_next_step_handler(msg, main_step)

def main_step(message):
	file = open("offer.txt", "w")
		file.write(inf)
		file.write(time)
		file.write(money)



@bot.message_handler(content_types=['text'])
def bot_message(message):
	if message.text == '1':
		bot.send_message(message.chat.id, 'Напишите чтобы выбрать бота: Чат-бот, Парсер-бот, другой вариант', parse_mode='html')

	elif message.text == 'Чат-бот':
		bot.send_message(message.chat.id, 'Введите команду - \"/Chat_bot \" чтобы заказать чат-бота', parse_mode='html')

	elif message.text == 'Парсер-бот':
		bot.send_message(message.chat.id, 'Введите команду - \"/Parser-bot \" чтобы заказать парсер-бота', parse_mode='html')

	elif message.text == 'другой вариант':
		bot.send_message(message.chat.id, 'Если хотите что-то другое, вам надо связаться со мной с помощь цифры - \"2\"', parse_mode='html')

	elif message.text == '2':
		markup = types.InlineKeyboardMarkup()
		markup.add(types.InlineKeyboardButton("Написать в Telegram", url='https://t.me/Human6536'))
		markup.add(types.InlineKeyboardButton("Написать в Viber", url='https://viber.click/380669941910'))
		markup.add(types.InlineKeyboardButton("Написать в WhatsApp", url='https://api.whatsapp.com/send/?phone=%2B380669941910&text&app_absent=0'))
		bot.send_message(message.chat.id, 'Варианты общения с разроботчиком:', reply_markup=markup)


	elif message.text == '3':
		bot.send_message(message.chat.id, 'Хорошо вот тебе варик - ', parse_mode='html')
		bot.send_message(message.chat.id, 'Еще не сделал:))) ', parse_mode='html')


	else:
		bot.send_message(message.chat.id, 'Не понимаю, \nПопробуйте еще раз', parse_mode='html')

@bot.message_handler(content_types=['photo'])
def get_user_photo(message):
	bot.send_message(message.chat.id, 'Пока!!!')


bot.polling(non_stop = True)
# 	money = '150'
# 	file = open("offer.txt", "w")
# 	file.write(money)
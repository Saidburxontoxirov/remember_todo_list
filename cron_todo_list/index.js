const TeleBot = require('telebot')
const axios = require('axios')
require('dotenv').config()

const BASE_URL = process.env.BASE_URL
const USERNAME = process.env.AUTH_USERNAME
const PASSWORD = process.env.AUTH_PASSWORD
const TOKEN = process.env.TELEGRAM_BOT_TOKEN
const chatId = process.env.CHAT_ID

const bot = new TeleBot({
  token: TOKEN
})

const CronJob = require('cron').CronJob
const job = new CronJob(
  '*/10 * * * *',
  async function () {
    console.log('You will see this message every 1 minute')
    const Tasks = await getTasks()

    let html = ``
    Tasks.data.data.forEach((task) => {
      html += `<pre>Task Id:</pre><strong> ${task.id}</strong>
          <pre> Task Name: </pre><strong> ${task.name}"</strong>
          <pre> StartTime: </pre><strong>${task.start_time}</strong>
          <pre>EndTime:</pre> <strong>${task.end_time}</strong>
          <pre>Importance:</pre> <strong>${task.level}</strong>
          <pre></pre><strong></strong>`
    })

    console.log(html)
    bot.sendMessage(chatId, html, {
      parseMode: 'HTML'
    })
  },
  null,
  true
)

bot.on('text', (msg) => {
  console.log(msg)
  msg.reply.text('RECIEVED MESSAGE: ' + msg.text)
})
bot.on(['/start', '/hello'], (msg) => {
  msg.reply.text('Welcome!')
  job.start()
})
bot.on(['/stop'], (msg) => {
  msg.reply.text('Good Bye!')
  job.stop()
})

bot.on('sticker', (msg) => {
  return msg.reply.sticker('http://i.imgur.com/VRYdhuD.png', { asReply: true })
})

bot.start()

async function getTasks() {
  try {
    const response = await axios.get(`${BASE_URL}/not_completed_tasks`, {
      auth: {
        username: USERNAME,
        password: PASSWORD
      }
    })
    return Promise.resolve(response)
  } catch (error) {
    console.log('Xatolik yuz berdi', error)
    return Promise.reject(error)
  }
}

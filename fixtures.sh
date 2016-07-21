#! /bin/bash

# User
echo "User"
./yii fixture/generate --count=100 --language=ru_RU user

# Profile
echo "User"
./yii fixture/generate --count=100 --language=ru_RU profile
./yii fixture/generate --count=300 --language=ru_RU contact

# Job
echo "Job"
./yii fixture/generate --count=100 --language=ru_RU workspace
./yii fixture/generate --count=10  --language=ru_RU job

# Badge
echo "Badge"
./yii fixture/generate --count=100 --language=ru_RU badge

./yii fixture/generate --count=300 --language=ru_RU profile2badge

# Task
echo "Task"
./yii fixture/generate --count=10  --language=ru_RU project
./yii fixture/generate --count=300 --language=ru_RU bonus
./yii fixture/generate --count=20  --language=ru_RU task_group
./yii fixture/generate --count=300 --language=ru_RU task

./yii fixture/generate --count=300 --language=ru_RU profile2task
./yii fixture/generate --count=40  --language=ru_RU project2bonus
./yii fixture/generate --count=10  --language=ru_RU group2project
./yii fixture/generate --count=40  --language=ru_RU group2bonus
./yii fixture/generate --count=100 --language=ru_RU task2project
./yii fixture/generate --count=40  --language=ru_RU task2group

# Level
echo "Level"
./yii fixture/generate --count=20  --language=ru_RU level

./yii fixture/generate --count=40  --language=ru_RU level2bonus
./yii fixture/generate --count=100 --language=ru_RU profile2level
./yii fixture/generate --count=40  --language=ru_RU task2level

# Shop
echo "Shop"
./yii fixture/generate wallet --count=10 --language=ru_RU
./yii fixture/generate shop_item --count=10 --language=ru_RU

# Advice
echo "Advice"
./yii fixture/generate --count=20 --language=ru_RU advice

# Stat
echo "Stat"
./yii fixture/generate stat --count=10 --language=ru_RU

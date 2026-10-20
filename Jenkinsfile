pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/waliya-malik/laravel-3tier.git'
            }
        }
        stage('Build Docker Image') {
            steps {
                bat 'docker build -t laravel-3tier .'
            }
        }
        stage('Deploy Container') {
            steps {
                bat '''
                docker rm -f laravel-app || exit 0
                docker run -d -p 8000:80 --name laravel-app laravel-3tier
                '''
            }
        }
    }
}

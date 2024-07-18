def gitUrl = "https://github.com/waycambas8/service-payment.git"
def service = "service-payment-app"
def serviceNginx = "service-payment-nginx"
def directory = "service-payment"
def nameContainer = "app-payment"

pipeline {
    agent any
    environment {
        GIT_CREDENTIALS = credentials('github-login-token')
    }
    stages {
        stage('Clone') {
            steps {
                script {
                    cleanWs()
                    checkout([$class: 'GitSCM', branches: [[name: 'main']], userRemoteConfigs: [[credentialsId: 'github-login-token', url: "${gitUrl}"]]])
                    echo "success step 1"
                }
            }
        }

        stage('SSH Client') {
            steps {
                sshagent(['ssh-app']) {
                    sh """
                        ssh -o StrictHostKeyChecking=no ec2-user@13.250.52.15 "
                            cd ${directory} && git pull origin main && sudo chmod -Rf 777 storage/
                            docker-compose -f .docker/development-compose.yml run --rm ${nameContainer} composer install
                            docker-compose -f .docker/development-compose.yml run --rm ${nameContainer} php artisan key:generate

                            docker-compose -f .docker/development-compose.yml up -d --build
                        "
                    """
                }
                echo "success step 2"
            }
        }
    }
}

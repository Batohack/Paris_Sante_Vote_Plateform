
# ========================
# ÉTAPE 1 : Build (Compilation)
# ========================
# Utilise une image JDK pour compiler votre code.
FROM eclipse-temurin:11-jdk-focal AS build

# Crée le répertoire de travail dans le conteneur.
WORKDIR /app

# Copie le fichier de construction (par exemple, pom.xml pour Maven ou build.gradle pour Gradle).
# Cela permet à Docker de mettre en cache la dépendance si ces fichiers ne changent pas.
# Remplacez "pom.xml" par le nom de votre fichier si vous utilisez un autre outil.
COPY pom.xml .
COPY settings.xml .

# Télécharge les dépendances (si vous utilisez Maven)
RUN mvn dependency:go-offline

# Copie le reste du code source
COPY src ./src

# Compile et package l'application.
# Le résultat attendu est un fichier JAR ou WAR dans le répertoire 'target/'.
RUN mvn package -DskipTests

# ========================
# ÉTAPE 2 : Runtime (Exécution)
# ========================
# Utilise une image JRE plus petite et plus sécurisée pour l'exécution.
FROM eclipse-temurin:11-jre-focal AS runtime

# Crée le répertoire de travail
WORKDIR /app

# Copie l'artefact (le JAR/WAR) compilé depuis l'étape de 'build'
# Cherchez le nom exact du fichier JAR créé par votre processus de build.
# Exemple : vote-platform-0.0.1-SNAPSHOT.jar
COPY --from=build /app/target/*.jar app.jar

# Démarre l'application.
ENTRYPOINT ["java", "-jar", "app.jar"]

# Le port par défaut que l'application utilise. Utile à titre informatif.
EXPOSE 8080
